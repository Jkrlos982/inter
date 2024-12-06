<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Asegúrate de que este sea el namespace correcto para tu modelo Role

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear los roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'profe']);
        Role::create(['name' => 'superAdmin']);
    }
}
