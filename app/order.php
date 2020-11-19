<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    public $timestamps = false;


    public function orderProduct(){
        return $this->hasMany('App\food_order','order_id');
    }   


    public function orderFood(){
        return $this->belongsToMany('App\restaurant_food','food_orders','order_id','food_id')->withPivot('amount');
    }   

    public function user(){
        return $this->belongsTo('App\Users','user_id');
    }   


    public function restaurant(){
        return $this->belongsTo('App\restaurant','restaurant_id');
    } 
}
