<?php

namespace App\Http\Controllers;

use App\Models\CustomerEventeLog;
use App\Models\CustomerInformation;
use Illuminate\Http\Request;
use App\Http\Resources\CustomersResource;

class CustomerInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerInformation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_first_name' => 'required|string|max:50',
            'customer_middle_name' => 'required|string|max:50',
            'customer_last_name' => 'required|string|max:50',
            'customer_phone' => 'required|string|unique:App\Models\CustomerInformation,customer_phone'
        ]);
        return CustomerInformation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CustomersResource(CustomerInformation::find($id));
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
        $request->validate([
            'customer_first_name' => 'string|max:50',
            'customer_middle_name' => 'string|max:50',
            'customer_last_name' => 'string|max:50',
            'customer_phone' => 'string|unique:App\Models\CustomerInformation,customer_phone'
        ]);
        $CustomerInformation = CustomerInformation::find($id);
        $CustomerInformation->update($request->all());
        return $CustomerInformation;

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
