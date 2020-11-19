<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class restaurant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

       return [
           'id'=>$this->id,
           'name'=>$this->name,
           'logo'=>$this->image,
           'description'=>$this->description,
           'phone'=>$this->phone,
           'type'=>type::collection($this->type),
           'food'=>Food::collection($this->food),
           'images'=>restaurantImage::collection($this->images),
           'videos'=>restaurantVideo::collection($this->Vedios),
           'servicesList'=>restaurantServices::collection($this->services),
           'workTimes'=>workTime::collection($this->workTime),
           'latitude'=>$this->latitude,
           'longitude'=>$this->longitude,
           'address'=>$this->address,
           'tables'=>restaurantTable::collection($this->tables),

        
       ];
    }
}
