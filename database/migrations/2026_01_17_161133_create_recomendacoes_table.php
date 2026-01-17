<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recomendacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('sugestao');
            $table->string('motivo', 255)->nullable();     // ex: "Consumo acima de 80% do habitual"
            $table->boolean('aceite')->default(false);     // se o utilizador aceitou/aplicou a sugestão
            $table->timestamp('data_sugerida')->useCurrent();
            $table->timestamp('data_aceite')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recomendacoes');
    }
};