<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //relacion con statuses

    public function status(){
        return $this->belongsTo('App\Models\statuses');
    }


    //relacion con peliculas

    public function rentals(){
        return $this->belongsToMany('App\Models\Movie');
    }

}
