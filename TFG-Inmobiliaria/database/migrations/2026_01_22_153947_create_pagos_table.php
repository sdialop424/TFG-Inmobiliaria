<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')
                  ->constrained('contratos')
                  ->onDelete('cascade');
            $table->string('mes', 20);
            $table->decimal('importe', 10, 2);
            $table->enum('estado', ['pagado', 'pendiente', 'retrasado'])->default('pendiente');
            $table->date('fecha_pago')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
