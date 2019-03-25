<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('player_id');
            $table->bigInteger('deco_id');
            $table->bigInteger('building_id');

            $table->integer('level');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')
                ->references('id')->on('players')
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
        Schema::dropIfExists('player_buildings');
    }
}
