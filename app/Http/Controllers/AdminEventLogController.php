<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminEventLogResourse;
use App\Models\AdminEventLog;
use App\Models\AdminInformation;
use Illuminate\Http\Request;

class AdminEventLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // creating instance of eventlog parent class
        $data=AdminInformation::find($id);

        return new AdminEventLogResourse($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating admin log request
        $request->validate([
            'admin_id'=> 'required|integer|exists:App\Models\AdminInformation,admin_id',
            'admin_event_action'=> 'required|string|max:150',
            'admin_event_detail'=> 'required|string'
        ]);

        //creating instance of admineventlog

        $data = new AdminEventLog([
            'admin_id'=>$request->get('admin_id'),
            'admin_event_action'=>$request->get('admin_event_action'),
            'admin_event_detail'=>$request->get('admin_event_detail')
        ]);

        //saving new instance

        $data->save();

        // returning new instance
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
        //return instance of admineventlog controller based on id
        return AdminEventLog::find($id);
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
