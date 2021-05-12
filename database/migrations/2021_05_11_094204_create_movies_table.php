<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->text('Title');
            $table->text('Year');
            $table->text('Rated');
            $table->date('Released');
            $table->text('Runtime');
            $table->text('Genre');
            $table->text('Director');
            $table->longText('Writer');
            $table->text('Actors');
            $table->longText('Plot');
            $table->text('Language');
            $table->text('Country');
            $table->text('Awards');
            $table->text('Poster');
            $table->text('Metascore');
            $table->float('imdbRating');
            $table->text('imdbVotes');
            $table->text('imdbID');
            $table->text('Type');
            $table->date('DVD');
            $table->text('BoxOffice');
            $table->text('Production');
            $table->text('Website');
            $table->text('Response');
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
        Schema::dropIfExists('movies');
    }
}
