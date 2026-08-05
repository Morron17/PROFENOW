<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Alumno de prueba
        $alumno = User::create([
            'name' => 'Alumno Test',
            'email' => 'alumno@test.com',
            'password' => bcrypt('123456'),
        ]);

        $alumno->roles()->attach(Role::where('name', 'Alumno')->first());
        // Student::create([
        //     'user_id' => $alumno->id,
        //     'matricula' => 'A-0001',
        //     'curso' => '3° Año',
        // ]);

        // Profesor de prueba
        $profe = User::create([
            'name' => 'Profesor Test',
            'email' => 'profe@test.com',
            'password' => bcrypt('123456'),
        ]);

        $profe->roles()->attach(Role::where('name', 'Profesor')->first());
        Teacher::create([
            'user_id' => $profe->id,
            'name' => 'Profesor Test',
            'subject' => 'Matemáticas',
        ]);
    }
}
