<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('material_id');
            $table->string('titulo');
            $table->text('contenido');
            $table->string('materia');
            $table->string('archivo');
$table->string('tipo')->default('imagen');
            $table->dateTime('fecha')->default(now());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
