<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class workTime extends JsonResource
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
            'day'=>$this->day,
            'from'=>$this->work_from,
            'to'=>$this->work_to
        ];
    }
}
