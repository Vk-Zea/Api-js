<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    protected $table = "statuses";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //relacion muchos a uno de estatus a type_Statuses

    public function typeStatus(){
        return $this->belongsTo('App\Models\type_statuses');
    }

    //relacion uno a muchos de estados y categorias

    public function categories(){
        return $this->hasMany('App\Models\categories');
    }

    //relacion uno a muchos con rentals

    public function rentals(){
        return $this->hasMany('App\Models\rentals');
    }

    //relacion uno a muchos con usuarios

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //relacion con roles

    public function roles(){
        return $this->hasMany('App\Models\roles');
    }

    //relacion con peliculasd

    public function movies(){
        return $this->hasMany('App\Models\Movie');
    }
}
