<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeterInformationResource;
use App\Models\MeterInformation;
use App\Models\SpInformation;
use Illuminate\Http\Request;

class MeterInfromationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of meter parent class
        $data = SpInformation::find($id);

        // returning resource meter instance
        return new MeterInformationResource($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchSerial($id)
    {
        return MeterInformation::where('meter_serial','like',$id.'%')->get();
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating request data
        $request->validate([
            'customer_id' => 'required|integer|exists:App\Models\CustomerInformation,customer_id',
            'sp_id' => 'required|integer|exists:App\Models\SpInformation,sp_id',
            'meter_serial' => 'required|string|unique:App\Models\MeterInformation,meter_serial',
            'meter_latitude' => 'required|numeric',
            'meter_longitude' => 'required|numeric'
        ]);

        // creating new instance of meter
        $data = new MeterInformation([
            'customer_id' => $request->get('customer_id'),
            'sp_id' => $request->get('sp_id'),
            'meter_serial' => $request->get('meter_serial'),
            'meter_latitude' => $request->get('meter_latitude'),
            'meter_longitude' => $request->get('meter_longitude'),
        ]);

        // saving the new instance
        $data->save();        

        // returning the new meter instance
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // returning instance of event log based on id
        return MeterInformation::find($id);
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
         // validating request data
         $request->validate([
            'customer_id' => 'integer|exists:App\Models\CustomerInformation,customer_id',
            'sp_id' => 'integer|exists:App\Models\SpInformation,sp_id',
            'meter_serial' => 'string',
            'meter_latitude' => 'string',
            'meter_longitude' => 'string'
        ]);

        // creating meter instance
        $data = MeterInformation::find($id);

        // updating instance
        $data->update([
            'customer_id' => ($request->get('customer_id')==null)?$data->customer_id:$request->get('customer_id'),
            'sp_id' => ($request->get('sp_id')==null)?$data->sp_id:$request->get('sp_id'),
            'meter_serial' => ($request->get('meter_serial')==null)?$data->meter_serial:$request->get('meter_serial'),
            'meter_latitude' => ($request->get('meter_latitude')==null)?$data->meter_latitude:$request->get('meter_latitude'),
            'meter_longitude' => ($request->get('meter_longitude')==null)?$data->meter_longitude:$request->get('meter_longitude'),
        ]);

        // returning instance of meter
        return $data;
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
