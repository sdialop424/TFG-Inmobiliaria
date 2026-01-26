<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propiedad_id')
                  ->constrained('propiedades')
                  ->unique()
                  ->onDelete('cascade');
            $table->string('comprador', 150);
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('comision', 10, 2)->nullable();
            $table->date('fecha_venta');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
