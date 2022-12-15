<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class getOnetodosResource extends JsonResource
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
            'id'=>$this->id,
            'todo'=>$this->todo,
            'dibuat'=>$this->created_at,
            'diupdate'=>$this->updated_at
        ];
    }
}
