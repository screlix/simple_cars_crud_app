<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('car_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('model_id');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('model_id')->references('id')->on('carModels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_productions');
    }
}
