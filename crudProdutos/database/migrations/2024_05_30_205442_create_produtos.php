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
        Schema::create('cores_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });
        
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nome');
            $table->string('descricao');
            $table->unsignedBigInteger('cor_id');
            $table->foreign('cor_id')->references('id')->on('cores_produtos')->onDelete('cascade');
            $table->longText('imagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
