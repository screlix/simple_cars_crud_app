<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cars')){
        Schema::create('cars', function (Blueprint $table) {
            $table->increments("id");
            $table->mediumText("brand");
            $table->longText("description");
        });
        Schema::create('carModels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->mediumText('model');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('carModels');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
