<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return [
            'id'=>$this->id,
            'created_at'=>$this->created_at,
            'Gname'=>$this->Gname,
            'Gdescription'=>$this->Gdescription,
            'game_chars_id'=>$this->game_chars_id,

        ];
    }
}
