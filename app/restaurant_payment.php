<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant_payment extends Model
{
    public function restaurant(){
    	return $this->belongsTo('App\restaurant','restaurant_id');
    }
}
