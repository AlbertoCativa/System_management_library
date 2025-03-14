<?php

use App\Models\Leitor;
use App\Models\Livro;
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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Livro::class);
            $table->foreignIdFor(Leitor::class);
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->enum('status', ['em_andamento', 'devolvido'])->default('em_andamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
