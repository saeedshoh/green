<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'id'            => $this->id,
            'type'          => mb_substr($this->type, 18),
            'notification'  => [
                'title'     => $this->data['title'],
                'message'   => $this->data['message'],
                'image'     => $this->data['img_path'],
            ],
            'read_at'       => $this->read_at,
            'created_at'    => $this->created_at
        ];
    }
}
