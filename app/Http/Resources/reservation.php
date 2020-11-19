<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class reservation extends JsonResource
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
            'table'=>restaurantTable::collection($this->table),
            'tableType'=>restaurantTableType::collection($this->type),
            'restaurant'=>restaurant::collection($this->restaurant),
            'count'=>$this->count,
            'date'=>$this->date,
            'time'=>$this->time
        ];
    }
}
