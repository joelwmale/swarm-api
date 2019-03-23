<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWizardUnitPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_unit_pieces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wizard_id');
            $table->bigInteger('monster_id');
            $table->string('attribute_id');

            $table->bigInteger('quantity');

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
        Schema::dropIfExists('wizard_unit_pieces');
    }
}
