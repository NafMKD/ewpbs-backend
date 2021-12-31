<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpEmployeeEventLogResource extends JsonResource
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
            "sp_emp_id" => $this->sp_id,
            "sp_emp_name" => $this->sp_emp_first_name." ".$this->sp_emp_middle_name." ".$this->sp_emp_last_name,
            "event_log" => $this->spEmployeeEventLog
        ];
    }
}
