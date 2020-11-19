<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
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
            'apiToken'=>$this->api_token,
            'name'=>$this->name,
            'email'=>$this->email,
            'image'=>$this->image,
            'phone'=>$this->phone,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude
        ];
    }
}
