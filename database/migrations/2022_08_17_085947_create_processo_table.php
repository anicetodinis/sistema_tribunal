<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo', function (Blueprint $table) {
            $table->id();
            $table->string('numero_processo');
            $table->unsignedBigInteger('juiz_id');
            $table->foreign('juiz_id')
                ->references('id')
                ->on('juiz')
                ->onDelete('cascade');
            $table->string('especie');
            $table->date('data');
            $table->string('criado_por');
            $table->string('actualizado_por');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processo');
    }
};
