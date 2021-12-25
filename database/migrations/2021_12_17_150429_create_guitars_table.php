<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuitarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guitars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('header', 64);
            $table->integer('price');
            $table->string('country', 64);
            $table->string('type', 64);
            $table->string('strun', 64);
            $table->string('grif', 64);
            $table->string('deka', 64);
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
        Schema::dropIfExists('guitars');
    }
}
