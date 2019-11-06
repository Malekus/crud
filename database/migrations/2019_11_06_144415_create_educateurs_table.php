<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducateursTable extends Migration
{

    public function up()
    {
        Schema::create('educateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educateurs');
    }
}
