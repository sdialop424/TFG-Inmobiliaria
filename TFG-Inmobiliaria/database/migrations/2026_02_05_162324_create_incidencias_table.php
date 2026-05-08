<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propiedad_id')->constrained("propiedades");
            $table->string('descripcion');
            $table->foreignId('tipo_incidencia_id')->constrained("tipos_incidencia");
            $table->foreignId('estado_incidencia_id')->constrained("estados_incidencia");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};