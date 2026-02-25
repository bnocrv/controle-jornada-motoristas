<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();

            // Ex.: "Iveco", "Mercedes"
            $table->string('descricao');

            // Opcional por enquanto
            $table->string('placa')->nullable();

            // Se o veículo está ativo/uso
            $table->boolean('ativo')->default(true);

            // created_at e updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};