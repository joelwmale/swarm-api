<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizardInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_inventory_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wizard_id');

            // The inventorable
            $table->bigInteger('inventorable_id');
            $table->string('inventorable_type');

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
        Schema::dropIfExists('wizard_essences');
    }
}
