<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpEmployeeResource extends JsonResource
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
            'sp_emp_id'	=> $this->sp_emp_id,
            'sp_id'	=> $this->sp_id,
            'sp_emp_first_name'	=> $this->sp_emp_first_name,
            'sp_emp_middle_name'	=> $this->sp_emp_middle_name,
            'sp_emp_last_name'	=> $this->sp_emp_last_name,
            'sp_emp_region'	=> $this->sp_emp_region,
            'sp_emp_town'	=> $this->sp_emp_town,
            'sp_emp_phone'	=> $this->sp_emp_phone,
            'sp_emp_house_no'	=> $this->sp_emp_house_no,
            'created_at'	=> $this->created_at,
            'updated_at'	=> $this->updated_at,
            'employee_acount' => $this->spEmployeeAccount,
            'employee_eventlog' => $this->spEmployeeEventLog
        ];
    }
}
