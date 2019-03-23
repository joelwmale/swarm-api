<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizardRunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_runes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rune_id');
            $table->unsignedBigInteger('wizard_id');

            // Classes and sets
            $table->bigInteger('class_id');
            $table->unsignedInteger('set_id');

            // Rune usage
            $table->boolean('occupied');
            $table->unsignedBigInteger('wizard_unit_id');

            // Slots & ranks
            $table->enum('slot', [1, 2, 3, 4, 5, 6]);
            $table->tinyInteger('rank');

            // Upgrades
            $table->integer('upgrade_max');
            $table->integer('upgrade_current');

            // Shop values
            $table->bigInteger('base_value');
            $table->bigInteger('sell_value');

            // Effects
            $table->json('primary_effect');
            $table->json('prefix_effect')->nullable();
            $table->json('secondary_effect')->nullable();

            $table->timestamps();

            $table->foreign('wizard_id')
                ->references('id')->on('wizards')
                ->onDelete('cascade');

            // $table->foreign('class_id')
            //     ->references('id')->on('game_classes')
            //     ->onDelete('cascade');

            $table->index(['wizard_id', 'wizard_unit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wizard_runes');
    }
}
