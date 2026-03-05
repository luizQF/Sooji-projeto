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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('situacaoAtual', ['pendente', 'concluida', 'vencida'])->default('pendente');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('descricao')->nullable();
            $table->json('dias')->nullable();
            $table->date('venc_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tarefas', function (Blueprint $table){
            $table->dropColumn('venc_date', 'situacaoAtual');
        });
    }
};
