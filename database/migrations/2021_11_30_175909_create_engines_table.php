<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('engines')) {
            Schema::create('engines', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('model_id')->unsigned();
                $table->mediumText('engine');
                $table->foreign('model_id')->references('id')->on('carModels')->onDelete('cascade');
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
        Schema::dropIfExists('engines');
    }
}
