<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('materiales')->insert([
            [
                'titulo' => 'Actividades para ejercitar la mente',
                'contenido' => 'Cuadernillo primero secundaria matemáticas',
                'archivo' => 'cuadernillo primero secundaria matemáticas.pdf',
                'tipo' => 'PDF',
                'materia' => 'Matemáticas',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Don Jose de San Martin',
                'contenido' => 'La historia del militar mas grande de Argentina.',
                'archivo' => 'jose_de_san_martin_libertador_de_america.pdf',
                'tipo' => 'PDF',
                'materia' => 'Historia',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'El sistema circulatorio',
                'contenido' => 'Todo sobre el sistema circulatorio.',
                'archivo' => 'sistema_circulatorio.pdf',
                'tipo' => 'PDF',
                'materia' => 'Biología',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'titulo' => 'Articulo de nivel primario',
                'contenido' => 'Lengua-y-literatura',
                'archivo' => 'lengua-y-literatura-ac.pdf',
                'tipo' => 'PDF',
                'materia' => 'Literatura',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'titulo' => 'Libro general de geografía',
                'contenido' => 'Este es el contenido del primer libro oficial de geografía.',
                'archivo' => 'actividades-geografía-IGN.pdf',
                'tipo' => 'PDF',
                'materia' => 'Geografía',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'titulo' => 'Verbo to be',
                'contenido' => 'Vocabulario algo complejo de ingles.',
                'archivo' => 'INGLESI-verbo-to-be.pdf',
                'tipo' => 'PDF',
                'materia' => 'Ingles',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
