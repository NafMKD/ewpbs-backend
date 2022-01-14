<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpcResource extends JsonResource
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
            "spc_id" => (string)$this->spc_id,
            "spc_name" => $this->spc_name,
            "created_at" => $this->created_at->format('Y-m-d H:i:s'),
            "updated_at" => $this->updated_at->format('Y-m-d H:i:s'),
            "spc_account" => $this->spcAccount,
            "spc_eventlog" => $this->spcEventLog,
            "spc_tarif" => $this->spcTarif
         ];
    }
}
