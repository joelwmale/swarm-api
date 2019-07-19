<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_monsters', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->unsignedBigInteger('attribute_id');

            $table->string('name');
            $table->string('icon')->nullable();

            $table->integer('skillups')->nullable();
            $table->json('awaken_material')->nullable();

            $table->timestamps();

            $table->foreign('attribute_id')
                ->references('id')->on('game_attributes')
                ->onDelete('cascade');

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
        Schema::dropIfExists('game_monsters');
    }
}
