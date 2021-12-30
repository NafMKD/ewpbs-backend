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
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "spc_account" => $this->spcAccount,
            "spc_eventlog" => $this->spcEventLog
         ];
    }
}
