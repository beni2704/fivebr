<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image');
            $table->string('about');
            $table->integer('price1');
            $table->integer('price2');
            $table->integer('price3');
            $table->string('desc1');
            $table->string('desc2');
            $table->string('desc3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
}
