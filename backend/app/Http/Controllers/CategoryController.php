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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
