<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->bigInteger('wizard_id');
            $table->string('wizard_name');
            $table->integer('wizard_level');

            $table->bigInteger('wizard_mana')->nullable();
            $table->bigInteger('wizard_crystal')->nullable();

            $table->integer('energy_max')->nullable();
            $table->double('energy_per_min', 2, 1)->nullable();

            $table->bigInteger('rep_unit_id')->nullable();

            $table->timestamp('last_login');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('wizards');
    }
}
