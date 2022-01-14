<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterRecordInformation;
use App\Models\MeterInformation;
use App\Models\ActiveBill;
use App\Models\SpcTarif;

class GenerateBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        
        $meter_record_data = MeterRecordInformation::find($id);

        if($meter_record_data->status == 1){

            $meter_information_data = MeterInformation::find($meter_record_data->meter_id);

            $prev_meter_record = MeterRecordInformation::where('meter_id', $meter_record_data->meter_id)->orderByDesc('meter_record_id')->where('meter_record_id', '<', $id)->limit(1)->get();
            if(count($prev_meter_record)<1){
                $prev_meter_record = 0;
            }else{
                $prev_meter_record = $prev_meter_record[0]['meter_reading'];
            }

            $calculated_reading = $meter_record_data->meter_reading - $prev_meter_record;

            $tarif_fetch = SpcTarif::where('spc_tarif_meter_min','<=',$calculated_reading)->where('spc_tarif_meter_max','>=',$calculated_reading)->get()[0];

            $calculated_amount = $calculated_reading * $tarif_fetch->spc_tarif_amount;

            $activebill_data = new ActiveBill([
                'sp_id' => $meter_information_data->sp_id,
                'customer_id' => $meter_information_data->customer_id,
                'ac_meter_reading' => $meter_record_data->meter_reading,
                'ac_meter_reading_previous' => $prev_meter_record,
                'ac_meter_reading_tarif'=> $tarif_fetch->spc_tarif_amount,
                'ac_amount_birr' => $calculated_amount,
                'ac_month_year' => $meter_record_data->meter_reading_month_year,
                'ac_reading_date' => $meter_record_data->meter_reading_date
            ]);
            $meter_record_data->update([
                'status' => 0
            ]);
            $meter_record_data->save();
            $activebill_data->save();
            return $activebill_data;
        }else{
            return json_encode(["data" => ["msg" => "already calculated"]]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
