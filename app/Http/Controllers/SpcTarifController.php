<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpcInformation;
use App\Http\Resources\SpcTarifResource;
use App\Models\SpcTarif;

class SpcTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of tarif parent class
        $data = SpcInformation::find($id);

        // returning resource  tarif instance
        return new SpcTarifResource($data);
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
            'spc_id' => 'required|integer|exists:App\Models\SpcInformation,spc_id',
            'spc_tarif_meter_min' => 'required|numeric|lt:spc_tarif_meter_max',
            'spc_tarif_meter_max' => 'required|numeric|gt:spc_tarif_meter_min',
            'spc_tarif_amount' => 'required|numeric'
        ]);

        // creating new instance of tarif
        $data = new SpcTarif([
            'spc_id' => $request->get('spc_id'),
            'spc_tarif_meter_min' => $request->get('spc_tarif_meter_min'),
            'spc_tarif_meter_max' => $request->get('spc_tarif_meter_max'),
            'spc_tarif_amount' => $request->get('spc_tarif_amount')
        ]);

        // saving the new instance
        $data->save();        

        // returning the new tarif instance
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
        return SpcTarif::find($id);
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
        // validating requested data
        $request->validate([
            'spc_tarif_meter_min' => 'required|numeric|lt:spc_tarif_meter_max',
            'spc_tarif_meter_max' => 'required|numeric|gt:spc_tarif_meter_min',
            'spc_tarif_amount' => 'numeric'
        ]);

        // creating new instance of tarif
        $data = SpcTarif::find($id);

        // updating instance of tarif
        $data->update([
            'spc_tarif_meter_min' => $request->get('spc_tarif_meter_min'),
            'spc_tarif_meter_max' => $request->get('spc_tarif_meter_max'),
            'spc_tarif_amount' => $request->get('spc_tarif_amount')
        ]);

        // returning instance of the updated tarif
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
