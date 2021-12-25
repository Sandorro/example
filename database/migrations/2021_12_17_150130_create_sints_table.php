<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sints', function (Blueprint $table) {
            $table->id();
            $table->string('header', 64);
            $table->integer('price');
            $table->string('country', 64);
            $table->string('type', 32);
            $table->integer('klav');
            $table->integer('zvuk');
            $table->string('comment');
            $table->string('image');
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
        Schema::dropIfExists('sints');
    }
}
