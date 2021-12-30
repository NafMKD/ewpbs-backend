<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpEventLogResource;
use App\Models\SpEventLog;
use App\Models\SpInformation;
use Illuminate\Http\Request;

class SpEventLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of eventlog parent class
        $data = SpInformation::find($id);

        // returning resource event log instance
        return new SpEventLogResource($data);
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
            'sp_id' => 'required|integer|exists:App\Models\SpInformation,sp_id',
            'sp_event_action' => 'required|string|max:150',
            'sp_event_detail' => 'required|string'
        ]);

        // creating new instance of event log
        $data = new SpEventLog([
            'sp_id' => $request->get('sp_id'),
            'sp_event_action' => $request->get('sp_event_action'),
            'sp_event_detail' => $request->get('sp_event_detail')
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
        return SpEventLog::find($id);
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
