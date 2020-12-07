<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_rental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained("movies");
            $table->foreignId('rental_id')->constrained("rentals");
            $table->integer("price");
            $table->string("observations");
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
        Schema::dropIfExists('movie_rental');
    }
}
