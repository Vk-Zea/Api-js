<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('category_movie', function (Blueprint $table) {
            $table->foreignId('movie_id')->constrained("movies");
            $table->foreignId('category_id')->constrained("categories");
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained("users");
        });
   
        
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('status_id')->constrained("statuses");
        });
   
        Schema::table('statuses', function (Blueprint $table) {
            $table->foreignId('type_status_id')->constrained("type_statuses");
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('status_id')->constrained("statuses");
            $table->foreignId('rol_id')->constrained("roles");
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('status_id')->constrained("statuses");
        });
   

    }

}
