<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutosCampanhaResource extends JsonResource
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
            'id' => $this->id,
            'campanha_id' => $this->campanha_id,
            'produto_id' => $this->produto_id,   
            'produto' => $this->produtos,
            
        ];
        return parent::toArray($request);
    }
}
