<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nome', 100);                  // ex: "Ar Condicionado Sala", "Frigorífico"
            $table->string('tipo', 50)->nullable();       // ex: "climatizacao", "iluminação", "eletrodoméstico", "outro"
            $table->float('consumo_base')->default(0);    // consumo médio/hora em Watts (para simulação)
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};