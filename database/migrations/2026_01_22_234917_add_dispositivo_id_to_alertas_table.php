<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('alertas', function (Blueprint $table) {
        $table->foreignId('dispositivo_id')
              ->nullable()
              ->constrained()
              ->onDelete('cascade');
              
        $table->index(['dispositivo_id', 'user_id']);
    });
}

public function down()
{
    Schema::table('alertas', function (Blueprint $table) {
        $table->dropForeign(['dispositivo_id']);
        $table->dropColumn('dispositivo_id');
    });
}
};
