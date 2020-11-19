<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class restaurantTable extends JsonResource
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
            'id'=>$this->table_id,

            // 'type'=>restaurantTableType::collection($this->type),


        ];
    }
}
