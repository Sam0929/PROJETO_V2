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
        Schema::create('profe', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Nome");  
            $table->string("CPF");
            $table->string("Endereço");
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
        Schema::dropIfExists('profe');
    }
};
