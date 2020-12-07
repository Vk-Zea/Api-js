<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_statuses extends Model
{
    protected $table = "type_statuses";
    protected $primaryKey = "id";
    public $timestamps = false; 

    //Relacion uno a muchos

    public function statuses(){
        return $this->hasMany('App\Models\statuses');
    }
}
