<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            //Fields: name, slug, description, release,date,rating,ticket,price,country,photo,genre_id
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->date('release');
            $table->date('date');
            $table->integer('rating');
            $table->integer('ticket');
            $table->integer('price');
            $table->string('country');
            $table->string('photo');
            // for genre there is different table
            $table->bigInteger('genre_id')->unsigned()->index()->nullable();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('set null');
            $table->BigInteger('user_id')->unsigned()->index();
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
        Schema::dropIfExists('films');
    }
}
