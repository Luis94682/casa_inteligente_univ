<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dispositivo_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // redundante mas ajuda em queries rápidas
            $table->float('valor');                 // valor medido (kWh ou Watts, conforme unidade)
            $table->string('unidade', 10)->default('kWh'); // kWh, Wh, W...
            $table->timestamp('medido_em')->useCurrent();
            $table->timestamps();

            $table->index(['user_id', 'medido_em']);
            $table->index('dispositivo_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consumos');
    }
};