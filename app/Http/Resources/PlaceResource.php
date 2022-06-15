<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
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
            'id'                => $this->id,
            'title'             => $this->title,
            'image'             => $this->image,
            'address'           => $this->address,
            'working_hours'     => $this->working_hours,
            'points_per_visit'  => $this->points_per_visit,
            'phone'             => $this->phone,
            'lat'               => $this->lat,
            'lng'               => $this->lng,
        ];
    }
}
