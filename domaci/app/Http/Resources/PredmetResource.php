<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PredmetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'predmet';
    
    public function toArray($request)
    {
        return [
        'id'=>$this->resource->id,
        'naziv'=>$this->resource->naziv,
        'opis'=>$this->resource->opis,
        'sef_katedre'=>$this->resource->sef_katedre,
        'espb'=>$this->resource->ESPB,

        ];
    }
}
