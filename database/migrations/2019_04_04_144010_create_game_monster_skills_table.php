<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameMonsterSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_monster_skills', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();

            $table->string('name');
            $table->text('description');
            $table->string('icon');

            $table->tinyInteger('slot');
            // @TODO add cooldown
            $table->tinyInteger('hits')->default(0);
            $table->boolean('aoe')->default(false);
            $table->boolean('passive')->default(false);
            $table->tinyInteger('max_level')->default(0);
            $table->json('level_progress_description');

            $table->string('multiplier_formula')->nullable();
            $table->text('multiplier_formula_raw')->nullable();

            $table->json('skill_effect')->nullable();
            $table->json('scaling_stats')->nullable();

            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_monster_skills');
    }
}
