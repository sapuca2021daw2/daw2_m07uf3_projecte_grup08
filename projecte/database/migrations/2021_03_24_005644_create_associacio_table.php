<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociacioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associacio', function (Blueprint $table) {
            $table->id();
            $table->string('cif')->unique();
            $table->string('nomAssociacio');
            $table->string('adrecaAssociacio');
            $table->string('poblacioAssociacio');
            $table->string('comarcaAssociacio');
            $table->string('tipus');
            $table->boolean('esDeclarada');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associacio');
    }
}

