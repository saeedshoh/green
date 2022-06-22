<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\Place;
use Illuminate\Http\Resources\Json\JsonResource;

class BallHistoryResource extends JsonResource
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
            'id'            =>  $this->id,
            'type'          => $this->type,
            'place_name'    => $this->when($this->type == 'place', Place::withTrashed()->find($this->model_id)->title ?? ''),
            'user_name'     => $this->when($this->type == 'connect', User::withTrashed()->find($this->model_id)->name ?? ''),
            'ball'          => $this->ball,
            'created_at'    => $this->created_at,

        ];
    }
}
