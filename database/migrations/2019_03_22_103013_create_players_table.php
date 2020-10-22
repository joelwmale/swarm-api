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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->bigInteger('player_id');
            $table->string('name');
            $table->integer('level');
            $table->integer('unit_slots');

            $table->string('current_mana')->nullable();
            $table->bigInteger('current_dimensional_hole_crystals')->nullable();
            $table->string('current_crystals')->nullable();

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
