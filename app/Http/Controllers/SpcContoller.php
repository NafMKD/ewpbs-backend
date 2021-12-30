<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SpcResource;
use App\Models\SpcInformation;
use App\Models\SpcAccount;
use Illuminate\Support\Facades\Hash;

class SpcContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all available spc data from database 
        return SpcInformation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating requested data
        $request->validate([
            'spc_name' => 'required|max:150|unique:App\Models\SpcInformation,spc_name',
            'spc_username' => 'required|max:50|unique:App\Models\SpcAccount,spc_username',
            'spc_password' => 'required|max:50|confirmed'
        ]);

        // creating instance of requested data
        $data = new SpcInformation([
            'spc_name' => $request->get('spc_name')
        ]);

        // storing requested data to database
        $data->save();

        // creating instance of spc account for newly created spc
        $data_account = new SpcAccount([
            'spc_id' => $data->spc_id,
            'spc_username' => $request->get('spc_username'),
            'spc_password' => Hash::make($request->get('spc_password'))
        ]);

        // storing spc instance to database
        $data_account->save();

        // returning stored data instance with instance of resource
        return new SpcResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // creating instace of resource data with available id
        $data = new SpcResource(SpcInformation::find($id));

        // returning instance of resource data 
        return $data;
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
            'spc_name' => 'max:150|unique:App\Models\SpcInformation,spc_name',
            'spc_username' => 'max:50|unique:App\Models\SpcAccount,spc_username',
            'spc_password' => 'max:50|confirmed'
        ]);

        // fetching instance of spc from database
        $data = SpcInformation::find($id);

        // updating instance of spc 
        $data->update([
            'spc_name' => $request->get('spc_name')
        ]);

        // updating instance of spc account
        $data->spcAccount->update([
            'spc_username' => $request->get('spc_username'),
            'spc_password' => Hash::make($request->get('spc_password'))
        ]);

        // returning updated instance with instance of resource
        return new SpcResource($data);
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
