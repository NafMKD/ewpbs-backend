<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpResource extends JsonResource
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
            'sp_id' => $this->sp_id,
            'sp_name' => $this->sp_name,
            'sp_region' => $this->sp_region,
            'sp_zone' => $this->sp_zone,
            'sp_town' => $this->sp_town,
            'created_at' =>	$this->created_at,
            'updated_at' => $this->updated_at,
            'sp_account' => $this->spAccount,
            'sp_eventlog' => $this->spEventLog
        ];
    }
}
