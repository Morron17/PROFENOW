<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('country')->nullable();

            $table->date('birthdate')->nullable();

            $table->string('materia')->nullable();

            $table->text('descripcion')->nullable();

            $table->text('horario')->nullable();

            $table->string('foto')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'country',
                'birthdate',
                'materia',
                'descripcion',
                'horario',
                'foto'
            ]);

        });
    }
};
