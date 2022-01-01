<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminEventLogResourse extends JsonResource
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
            'admin_id'=>$this->admin_id,
            'admin_name'=>$this->admin_first_name." ".$this->admin_last_name,
            'event_log'=>$this->adminEventlog
        ];
    }
}
