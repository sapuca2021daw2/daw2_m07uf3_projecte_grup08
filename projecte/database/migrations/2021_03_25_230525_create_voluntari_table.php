<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntari', function (Blueprint $table) {
            $table->id();
            $table->foreignID('treballador_id')->constrained('treballador')->onDelete('cascade');
            $table->string('edat');
            $table->string('professio');
            $table->string('horesDedicades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voluntari');
    }
}
