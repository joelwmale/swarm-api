<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_units', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->bigInteger('unit_id');
            $table->unsignedInteger('monster_id');

            // Misc
            $table->tinyInteger('rank'); // 1,2,3 stars etc
            $table->integer('level');

            // con, atk, def, spd, resist
            // accuracy, critical_rate, critical_damage
            $table->json('stats');

            // 0 = skill_id, 1 = level
            $table->json('skills');

            $table->datetime('unlocked')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');

            $table->foreign('monster_id')
                ->references('id')->on('game_monsters')
                ->onDelete('cascade');

            $table->index(['player_id', 'unit_id', 'monster_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_units');
    }
}
