<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    protected $table = "peternak";

    public function hasilternak(){ 
        return $this->hasMany('App\HasilTernak'); 
    }
}
