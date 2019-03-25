<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');

            // The inventorable
            $table->bigInteger('inventorable_id');
            $table->string('inventorable_type');

            $table->bigInteger('quantity');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('player_id')
                ->references('id')->on('players')
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
        Schema::dropIfExists('player_inventory_items');
    }
}
