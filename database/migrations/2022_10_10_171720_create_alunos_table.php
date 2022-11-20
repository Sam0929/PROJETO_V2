<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            
            $table->id();                                                             //BANCO DE DADOS, É NECESSARIO TER UM FORM DE CRIAÇÃO APENAS PARA PROFESSORES E APENAS PARA MATÉRIAS. DEPOIS DE CRIAR O PROFESSOR QUE SERÁ POSSÍVEL CRIAR UMA MATÉRIA, RELACIONANDO PROFESSOR-MATÉRIA.
            $table->timestamps();                                                     //OUTRO FORM É NECESSÁRIO PARA CADASTRAR UM ALUNO E SUAS MATÉRIAS E FILMES, ALÉM DE RA, ID 
            $table->string("CPF");
            $table->string("Endereço");
            $table->string("Filme");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
