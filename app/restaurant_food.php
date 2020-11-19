<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant_food extends Model
{
    public function category(){
        return $this->belongsTo('App\foodCategory','food_category_id');
    }
}
