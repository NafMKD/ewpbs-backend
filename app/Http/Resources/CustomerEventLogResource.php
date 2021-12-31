<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerEventLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            "customer_id" => $this->customer_id,
            "customer_name" => $this->customer_first_name." ".$this->customer_middle_name ." ". $this->customer_last_name,
            "event_log" => $this->customerEventLog
        ];
    }
}
