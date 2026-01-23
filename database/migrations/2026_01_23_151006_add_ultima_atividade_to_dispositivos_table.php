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
    Schema::table('dispositivos', function (Blueprint $table) {
        $table->timestamp('ultima_atividade_at')->nullable()->after('ativo');
    });
}

public function down()
{
    Schema::table('dispositivos', function (Blueprint $table) {
        $table->dropColumn('ultima_atividade_at');
    });
}
};
