<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    public $timestamps = false;

    public function table(){
        return $this->belongsTo('App\restaurant_table','table_id');
    }   

    public function user(){
        return $this->belongsTo('App\Users','user_id');
    }   


    public function restaurant(){
        return $this->belongsTo('App\restaurant','restaurant_id');
    }  
}
