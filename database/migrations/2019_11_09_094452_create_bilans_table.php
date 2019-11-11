<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilansTable extends Migration
{

    public function up()
    {
        Schema::create('bilans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->text('rapport');
            $table->integer('eleve_id')->nullable()->unsigned()->index();
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bilans');
    }
}
