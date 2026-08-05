<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [

            [
                'name' => 'Profesor Patata',
                'subject' => 'Matemáticas',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesor Ramírez',
                'subject' => 'Historia',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesora Carla',
                'subject' => 'Biología',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesor Carlos',
                'subject' => 'Lengua',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesora Beatriz',
                'subject' => 'Matemáticas',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesor Matias',
                'subject' => 'Geografía',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesor Martín',
                'subject' => 'Historia',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesor Victoria',
                'subject' => 'Filosofía',
                'user_id' => 2,
            ],

            [
                'name' => 'Profesora Marta',
                'subject' => 'Lengua',
                'user_id' => 2,
            ],

        ];

        foreach ($teachers as $teacher) {

            Teacher::firstOrCreate(
                ['name' => $teacher['name']],
                $teacher
            );

        }
    }
}
