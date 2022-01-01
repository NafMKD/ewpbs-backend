<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'admin_id'=>(string)$this->admin_id,
            'admin_first_name'=>$this->admin_first_name,
            'admin_last_name'=>$this->admin_last_name,
            'admin_phone'=>$this->admin_phone,
            "admin_account" => $this->adminAccount,
            "admin_event" => $this->adminEventLog
        ];
    }
}
