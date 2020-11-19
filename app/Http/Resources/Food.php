<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Food extends JsonResource
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
            'image'=>$this->image,
            'name'=>\App::getLocale() == 'ar' ? $this->name : $this->name_en,
            'description'=>\App::getLocale() == 'ar' ? $this->description :$this->description_en,
            'price'=>$this->price,
            'category'=>new FoodCategories($this->category)
            
        ];
    }
}
