<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWizardBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wizard_id');
            $table->bigInteger('deco_id');
            $table->bigInteger('building_id');

            $table->integer('level');

            $table->timestamps();

            $table->foreign('wizard_id')
                ->references('id')->on('wizards')
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
        Schema::dropIfExists('wizard_buildings');
    }
}
