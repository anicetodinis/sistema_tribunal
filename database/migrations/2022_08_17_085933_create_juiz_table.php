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
        Schema::create('juiz', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('sessao_id');
            $table->foreign('sessao_id')
                ->references('id')
                ->on('sessao')
                ->onDelete('cascade');
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
        Schema::dropIfExists('juiz');
    }
};
