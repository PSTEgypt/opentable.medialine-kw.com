<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class restaurant extends Authenticatable
{
    use SoftDeletes;
    
    use Notifiable;
    
    public $table="restaurants";
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public $timestamps = false;

        public function category(){
        return $this->hasMany('App\restaurant_category','restaurant_id');
    }


    public function services(){
        return $this->hasMany('App\restaurant_service','restaurant_id');
    }


    public function images(){
        return $this->hasMany('App\restaurant_image','restaurant_id');
    }


    public function food(){
        return $this->hasMany('App\restaurant_food','restaurant_id');
    }


    public function workTime(){
        return $this->hasMany('App\timework','restaurant_id');
    }

    public function tables(){
        return $this->hasMany('App\restaurant_table','restaurant_id');
    }   
    


    public function table(){
        return $this->hasMany('App\restaurant_table','restaurant_id');
    }   
    public function Vedios(){
        return $this->hasMany('App\restaurant_vedio','restaurant_id');
    }   

    
    public function types(){
        return $this->belongsToMany('App\type','restaurant_types','restaurant_id','type_id');
    }

        public function type(){
        return $this->belongsToMany('App\type','restaurant_types','restaurant_id','type_id');
    }

    

    public function payment(){
        return $this->hasMany('App\restaurant_payment','restaurant_id');
    }


}
