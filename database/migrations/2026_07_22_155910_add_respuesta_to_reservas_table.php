<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservas', function (Blueprint $table) {

            $table->string('tipo_reunion')->nullable();

            $table->text('mensaje_profesor')->nullable();

            $table->string('estado')
                  ->default('Pendiente');

        });
    }

    public function down(): void
    {
        Schema::table('reservas', function (Blueprint $table) {

            $table->dropColumn([
                'tipo_reunion',
                'mensaje_profesor',
                'estado'
            ]);

        });
    }
};
