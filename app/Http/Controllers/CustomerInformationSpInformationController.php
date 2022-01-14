<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerInformationSpInformation;
use App\Models\CustomerInformation;

class CustomerInformationSpInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spShow($id)
    {
        //
        $data = CustomerInformationSpInformation::join('customer_information', 'customer_information.customer_id', 'customer_information_sp_information.customer_id')->where('sp_id', $id)->get();
        return $data;
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
            'sp_id' => 'required|numeric|exists:App\Models\SpInformation,sp_id',
            'customer_id' => 'required|numeric|exists:App\Models\CustomerInformation,customer_id',
            'status' => 'numeric'
        ]);

        $data = new CustomerInformationSpInformation([
            'sp_id' => $request->get('sp_id'),
            'customer_id' => $request->get('customer_id'),
            'status' => $request->get('status')
        ]);

        $data->save();
        
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
