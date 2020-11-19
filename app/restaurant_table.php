<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurant_table extends Model
{
    public $table='restaurant_tables';

    public function tableType(){
        return $this->belongsTo('App\tableType','type_id');
    }
}
