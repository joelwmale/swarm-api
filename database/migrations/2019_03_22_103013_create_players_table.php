<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->bigInteger('player_id');
            $table->string('player_name');
            $table->integer('player_level');

            $table->bigInteger('player_mana')->nullable();
            $table->bigInteger('player_crystal')->nullable();

            $table->integer('energy_max')->nullable();
            $table->double('energy_per_min', 2, 1)->nullable();

            $table->bigInteger('rep_unit_id')->nullable();

            $table->timestamp('last_login');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('players');
    }
}
