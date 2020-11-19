<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class restaurantType extends JsonResource
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
            'restaurants'=>restaurant::collection($this->restaurant)
        ];
    }
}
