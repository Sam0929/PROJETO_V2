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
            
            $table->id();                                                             
            $table->timestamps();
            $table->string("Nome");
            $table->string("CPF");                                         
            $table->string("Endereço");
            $table->string("Filme");
            $table->foreignid("user_id")->constrained()->onDelete('cascade');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos', function (Blueprint $table) {
            $table->dropForeign('alunos_user_id_foreign');
        });
    }
};
