<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuneSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rune_sets', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();

            $table->string('name');
            $table->tinyInteger('set_pieces');
            $table->string('effect')->nullable();
            $table->string('effect_percent');
            $table->string('effect_special')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rune_sets');
    }
}
