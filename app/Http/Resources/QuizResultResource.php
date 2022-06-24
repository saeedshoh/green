<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        foreach ($this->variants as $answer) {
            $answer->result = $this->users->where('pivot.answer_id', $answer->id)->count();
            $answer->percent = $answer->result * 100 / $this->users_count;
        }

        return [
            'id'                    => $this->id,
            'points_for_passing'    => $this->points_for_passing,
            'all_result_count'      => $this->users_count,
            'variants'              => $this->variants->map->only(['id', 'title', 'result', 'percent']),
        ];
    }
}
