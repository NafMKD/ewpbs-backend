<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpcEventLog;
use App\Models\SpcInformation;
use App\Http\Resources\SpcEventLogResource;

class SpcEventLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of eventlog parent class
        $data = SpcInformation::find($id);

        // returning resource escaped event log belongs to one spc
        return new SpcEventLogResource($data);
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
            'spc_id' => 'required|integer|exists:App\Models\SpcEventLog,spc_id',
            'spc_event_action' => 'required|string|max:150',
            'spc_event_detail' => 'required|string'
        ]);

        // creating new instance of event log
        $data = new SpcEventLog([
            'spc_id' => $request->get('spc_id'),
            'spc_event_action' => $request->get('spc_event_action'),
            'spc_event_detail' => $request->get('spc_event_detail')
        ]);

        // saving the new instance
        $data->save();        

        // returning the new event log instance
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
        return SpcEventLog::find($id);
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
