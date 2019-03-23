<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizardUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wizard_id');
            $table->bigInteger('unit_id');

            $table->unsignedBigInteger('monster_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('attribute_id');

            // Misc
            $table->integer('level');

            // con, atk, def, spd, resist
            // accuracy, critical_rate, critical_damage
            $table->json('stats');

            // 0 = skill_id, 1 = level
            $table->json('skills');

            $table->datetime('unlocked')->nullable();

            $table->timestamps();

            $table->foreign('wizard_id')
                ->references('id')->on('wizards')
                ->onDelete('cascade');

            $table->index(['wizard_id', 'monster_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wizard_units');
    }
}
