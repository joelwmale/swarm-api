<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerRunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_runes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rune_id');
            $table->unsignedBigInteger('player_id');

            // Rune set
            $table->unsignedBigInteger('set_id');

            // Class & Rune usage
            $table->boolean('occupied');
            $table->unsignedBigInteger('player_unit_id');

            // Slot, quality & rank
            $table->enum('slot', [1, 2, 3, 4, 5, 6]);
            $table->tinyInteger('quality');
            $table->tinyInteger('rank');

            // Upgrades
            $table->integer('current_level');
            $table->integer('max_level');

            // Shop values
            $table->bigInteger('base_value');
            $table->bigInteger('sell_value');

            // Effects
            $table->json('primary_effects');
            $table->json('prefix_effects')->nullable();
            $table->json('secondary_effects')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')
                ->references('id')->on('players')
                ->onDelete('cascade');

            $table->index(['player_id', 'player_unit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_runes');
    }
}
