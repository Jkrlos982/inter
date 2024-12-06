<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Asegúrate de que este sea el namespace correcto para tu modelo User
use App\Models\Role;  // Y también para el modelo Role
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el usuario admin
        $admin = User::create([
            'name' => 'Super Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Fuz!0n@01'), // Cambia la contraseña según sea necesario
        ]);

        // Asignar el rol de admin
        $adminRole = Role::where('name', 'superAdmin')->first(); // Encuentra el rol de admin
        $admin->roles()->attach($adminRole); // Asocia el rol al usuario
    }
}
