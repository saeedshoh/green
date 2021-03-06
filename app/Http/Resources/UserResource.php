<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'user';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'uuid'      => $this->uuid,
            'name'      => $this->name,
            'phone'     => $this->phone,
            'avatar'    => $this->avatar,
            'gender'    => $this->gender,
            'birthday'  => $this->birthday,
            'lat'       => $this->lat,
            'lng'       => $this->lng,
            'ball'      => $this->ball,
            'position'  => $this->position,
        ];
    }
}
