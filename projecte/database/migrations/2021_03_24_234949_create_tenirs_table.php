<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soci_id')->constrained('socis');
            $table->foreignId('associacio_id')->constrained('associacio');
            $table->date('dataAltaSoci');
            $table->double('quotaMensual',5,2);
            $table->double('aportacioAnual',10,2);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenirs');
    }
}
