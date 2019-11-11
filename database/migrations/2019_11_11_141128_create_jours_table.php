<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jours', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateExclu');
            $table->boolean('matinAbsent')->default(0);
            $table->boolean('matinRetard')->default(0);
            $table->boolean('apremAbsent')->default(0);
            $table->boolean('apremRetard')->default(0);
            $table->integer('planning_id')->unsigned()->index();
            $table->foreign('planning_id')->references('id')->on('plannings')->onDelete('cascade');
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
        Schema::dropIfExists('jours');
    }
}
