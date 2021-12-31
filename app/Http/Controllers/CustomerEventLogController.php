<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerEventLogResource;
use App\Models\CustomerEventeLog;
use App\Models\CustomerInformation;
use Illuminate\Http\Request;

class CustomerEventLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of eventlog parent class
        $data = CustomerInformation::find($id);

        // returning resource event log instance
        return new CustomerEventLogResource($data);
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
            'customer_event_action' => 'required|string|max:150',
            'customer_event_detail' => 'required|string'
        ]);

        // creating new instance of event log
        $data = new CustomerEventeLog([
            'customer_id' => $request->get('customer_id'),
            'customer_event_action' => $request->get('customer_event_action'),
            'customer_event_detail' => $request->get('customer_event_detail')
        ]);

        // saving the new instance
        $data->save();        

        // returning the new event log instance
        return $data;
    }

    /**CustomerEventLog
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // returning instance of event log based on id
         return CustomerEventeLog::find($id);
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
