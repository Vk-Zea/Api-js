<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //relacion con statuses

    public function status(){
        return $this->belongsTo('App\Models\statuses');
    }

    //relacion con usuarios

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
