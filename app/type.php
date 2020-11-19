<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public function restaurant(){
        return $this->belongsToMany('App\restaurant','restaurant_types','type_id','restaurant_id');
    }
}
