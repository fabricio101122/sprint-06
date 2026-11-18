<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ticket #009 - Tabela pivot N:M entre Pergunta e User (upvotes).
     * Criada com: php artisan make:migration create_pergunta_user_table --create=pergunta_user
     */
    public function up(): void
    {
        Schema::create('pergunta_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pergunta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamps();

            // Impede que o mesmo usuário vote duas vezes na mesma pergunta
            $table->unique(['pergunta_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pergunta_user');
    }
};
