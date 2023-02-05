<?php

namespace App\Http\Resources;

use App\Models\Tip;
use Illuminate\Http\Resources\Json\JsonResource;

class TreningResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tip = Tip::find($this->tipId);

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'duzina' => $this->duzina,
            'tip' => $tip->tip,
            'tezina' => $this->tezina
        ];
    }
}
