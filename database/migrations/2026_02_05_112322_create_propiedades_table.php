<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained("users");
            $table->foreignId('tipo_propiedad_id')->constrained("tipos_propiedad");
            $table->string('direccion');
            $table->timestamps();
        }); 
    }

    
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
