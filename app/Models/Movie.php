<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "movies";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //reladcion many to many a categoria

    public function categories(){
        return $this->belongsToMany('App\Models\categories');
    }

    //relacion many to many con rentals
    
    public function rentals(){
        return $this->belongsToMany('App\Models\rentals');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function status(){
        return $this->belongsTo('App\Models\statuses');
    }
}
