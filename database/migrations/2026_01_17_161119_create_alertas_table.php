<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('mensagem');
            $table->enum('nivel', ['info', 'aviso', 'urgente'])->default('aviso');
            $table->boolean('lido')->default(false);
            $table->timestamp('data_alerta')->useCurrent();
            $table->timestamps();

            $table->index(['user_id', 'data_alerta']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};