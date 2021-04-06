<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socis', function (Blueprint $table) {
            $table->id();
            $table->string('nifSoci')->unique();
            $table->string('nomSoci');
            $table->string('cognomsSoci');
            $table->string('adrecaSoci');
            $table->string('poblacioSoci');
            $table->string('comarcaSoci');
            $table->string('fixeSoci');
            $table->string('mobilSoci');
            $table->string('correuSoci');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socis');
    }
}
