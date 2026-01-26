<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->string('tipo', 50);
            $table->decimal('precio', 10, 2);
            $table->enum('estado', ['disponible', 'alquilado', 'vendido'])->default('disponible');
            $table->foreignId('usuario_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
