<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DomaciResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
        'id' => $this->resource->id,
        'opis' => $this->resource->opis,
        'datum' => $this->resource->datum,
        'predmet' => new PredmetResource($this->resource->predmet),
        'student' => new StudentResource($this->resource->student),
        
       ];
    }
}
