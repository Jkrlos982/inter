<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profes = User::whereHas('roles', function ($query) {
            $query->where('name', 'profe');
        })->get();

        return view('category.create', compact('profes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $user = User::find($request->user_id);

        if (!$user || !$user->hasRole('profe')) {
            return redirect()->back()->withErrors(['user_id' => 'El usuario seleccionado no tiene el rol de profe']);
        }

        Category::create([
            'name' => $request->name,
            'year' => $request->year,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('category.index')->with('success', 'Categoría creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Filtra los usuarios que tienen el rol 'profe'
        $profes = User::whereHas('roles', function ($query) {
            $query->where('name', 'profe');
        })->get();
        return view('category.edit', compact('category', 'profes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:'.date('Y'), // Valida que sea un año válido.
            'user_id' => 'required|exists:users,id', // Verifica que el profe asignado exista.
        ]);

        $category->update([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('category.index')->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id); // Encuentra la categoría o lanza un error 404.
        $category->delete(); // Elimina la categoría de la base de datos.

        return redirect()->route('category.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
