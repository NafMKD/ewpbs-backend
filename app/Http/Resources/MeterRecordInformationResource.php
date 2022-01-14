<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeterRecordInformationResource extends JsonResource
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
            'meter_record_id' => $this->meter_record_id,
            'sp_emp_info' => $this->employeeRead,
            'meter_info'=> $this->meterRead,
            'meter_reading'=> $this->meter_reading,
            'meter_reading_month_year'=> $this->meter_reading_month_year,
            'meter_reading_date'=> $this->meter_reading_date,
            'status'=> $this->status,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at
        ];
    }
}
