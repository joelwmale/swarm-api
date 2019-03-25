<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerUnitPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_unit_pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');

            $table->unsignedInteger('monster_id');

            $table->bigInteger('quantity');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');

            $table->foreign('monster_id')
                ->references('id')->on('game_monsters')
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
        Schema::dropIfExists('player_unit_pieces');
    }
}
