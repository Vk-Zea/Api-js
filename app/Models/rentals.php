<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentals extends Model
{
    protected $table = "rentals";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //relacion many to many con movies

    public function movies(){
        return $this->belongsToMany('App\Models\Movie');
    }

    //relacion muchos a uno con statuses

    public function status(){
        return $this->belongsTo('App\Models\statuses');
    }
}
