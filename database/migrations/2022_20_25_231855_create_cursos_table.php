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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Nome");
            $table->string("Tipo");
            $table->string("Resumo");
            $table->text("Descrição");
            $table->integer("Max");
            $table->integer("Min");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos', function (Blueprint $table) {
            $table->dropForeign('cursos_user_id_foreign');
        });
    
    }
};
