<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomersResource extends JsonResource
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
            "customer_id" => (string) $this->customer_id,
            "customer_first_name" => $this->customer_first_name,
            "customer_middle_name" => $this->customer_middle_name,
            "customer_last_name" => $this->customer_last_name,
            "customer_phone" => $this->customer_phone,
            "customer_region" => $this->customer_region,
            "customer_town" => $this->customer_town,
            "customer_kebele" => $this->customer_kebele,
            "customer_house_no" => $this->customer_house_no,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "customer_account" => $this->customerAccount,
            "customer_event" => $this->customerEventLog,
            "sp_information" => $this->spInformation
        ];
    }
}
