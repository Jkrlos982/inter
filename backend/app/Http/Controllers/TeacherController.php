<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TeacherController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware(['CheckRoleAdmin', 'CheckRoleSuperAdmin'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if(!empty($search)) {
            $teachers = User::orderBy('id', 'desc')->when($search, function($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
            })->whereHas('roles', function($query){
                $query->where('name', 'profe');
            })->paginate(10);
        } else {
            $teachers = User::whereHas('roles', function($query){
                $query->where('name', 'profe');
            })->paginate(10);
        }

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Asignar el rol de 'profe'
        $role = Role::where('name', 'profe')->first();
        $user->roles()->attach($role);

        return redirect()->route('teacher.index')->with('success', 'El profesor ha sido creado exitosamente.');
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
        $user = User::find($id);
        return view('teacher.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
        ]);

        // Actualizar el profesor
        $teacher->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Redireccionar de vuelta a la lista de profesores con un mensaje de éxito
        return redirect()->route('teacher.index')->with('success', 'Profesor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        //
        // Eliminar el profesor
        $teacher->delete();

        // Redireccionar a la lista de profesores con un mensaje de éxito
        return redirect()->route('teacher.index')->with('success', 'Profesor eliminado correctamente.');
    }
}
