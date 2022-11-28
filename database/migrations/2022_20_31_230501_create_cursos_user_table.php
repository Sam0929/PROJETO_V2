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
        Schema::create('cursos_user', function (Blueprint $table) {
            $table->foreignid('cursos_id')->constrained() ->onDelete('cascade');
            $table->foreignid('user_id')->constrained() ->onDelete('cascade');
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
        Schema::dropIfExists('cursos_user', function (Blueprint $table) {
            $table->dropForeign('cursos_user_cursos_id_foreign');
            $table->dropForeign('cursos_user_user_id_foreign');
        });
    }
};
