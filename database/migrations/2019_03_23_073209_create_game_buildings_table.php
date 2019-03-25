<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_buildings', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('game_id')->unsigned();
            $table->string('raw_name');
            $table->string('name');
            $table->string('asset');

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
        Schema::dropIfExists('game_buildings');
    }
}
