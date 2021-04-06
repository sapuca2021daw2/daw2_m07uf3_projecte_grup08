<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreballadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treballador', function (Blueprint $table) {
            $table->id();
            $table->string('nifTreballador')->unique();
            $table->string('nomTreballador');
            $table->string('cognomsTreballador');
            $table->string('adrecaTreballador');
            $table->string('poblacioTreballador');
            $table->string('comarcaTreballador');
            $table->string('fixeTreballador');
            $table->string('mobilTreballador');
            $table->string('correuTreballador');
            $table->date('dataIngresTreballador');
            $table->foreignId('associacio_id')->constrained('associacio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treballador');
    }
}
