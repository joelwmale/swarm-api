<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_monsters', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('attribute_id');

            $table->bigInteger('game_id')->unsigned();
            $table->string('name');

            $table->timestamps();

            $table->foreign('attribute_id')
                ->references('id')->on('game_attributes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_monsters');
    }
}
