<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTernak extends Model
{
    protected $table = "hasil_ternak";

    public function peternak(){
    	return $this->belongsTo('App\Peternak');
    }
}
