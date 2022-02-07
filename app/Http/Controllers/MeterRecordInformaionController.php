<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeterRecordInformationResource;
use App\Models\MeterRecordInformation;
use App\Models\SpInformation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MeterRecordInformaionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returning  meter record instance
        return MeterRecordInformation::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empShow($id)
    {
        // returning  meter record instance
        return MeterRecordInformation::where('sp_emp_id', $id)->join('meter_information', 'meter_information.meter_id', 'meter_record_information.meter_id')->join('customer_information', 'customer_information.customer_id', 'meter_information.customer_id')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spShowActive($id)
    {
        // returning  meter record instance
        return SpInformation::where('sp_information.sp_id', $id)->join('sp_employee_information', 'sp_employee_information.sp_id', 'sp_information.sp_id')->join('meter_record_information', 'meter_record_information.sp_emp_id', 'sp_employee_information.sp_emp_id')->join('meter_information','meter_information.meter_id', 'meter_record_information.meter_id')->join('customer_information','customer_information.customer_id', 'meter_information.customer_id')->where('status', 1)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spShowCalculated($id)
    {
        // returning  meter record instance
        return SpInformation::where('sp_information.sp_id', $id)->join('sp_employee_information', 'sp_employee_information.sp_id', 'sp_information.sp_id')->join('meter_record_information', 'meter_record_information.sp_emp_id', 'sp_employee_information.sp_emp_id')->join('meter_information','meter_information.meter_id', 'meter_record_information.meter_id')->join('customer_information','customer_information.customer_id', 'meter_information.customer_id')->where('status', 0)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating request
        $request->validate([
            'sp_emp_id' => 'required|integer|exists:\App\Models\SpEmployeeInformation,sp_emp_id', 
            'meter_id' => 'required|integer|exists:\App\Models\MeterInformation,meter_id', 
            'meter_reading' => 'required|integer', 
            'meter_reading_month_year' => ['required','date_format:Y-m-d',Rule::unique('meter_record_information')->where(function ($query) use ($request) {
    return $query->where('meter_id', $request->get('meter_id'));})], 
            'meter_reading_date' => 'required|date_format:Y-m-d'
        ]);

        // creating new instance
        $data = MeterRecordInformation::create([
            'sp_emp_id' => $request->get('sp_emp_id'), 
            'meter_id' => $request->get('meter_id'), 
            'meter_reading' => $request->get('meter_reading'), 
            'status' => 1, 
            'meter_reading_month_year' => $request->get('meter_reading_month_year'), 
            'meter_reading_date' => $request->get('meter_reading_date')
        ]);

        // returning resource instance of new instance
        return  new MeterRecordInformationResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // returning resource instance of meter record instance
        return new MeterRecordInformationResource(MeterRecordInformation::find($id));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function status($status)
    {
        // returning  meter record instance
        return MeterRecordInformation::where('status',$status)->get();
    }
}
