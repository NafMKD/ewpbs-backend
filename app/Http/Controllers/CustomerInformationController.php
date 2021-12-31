<?php

namespace App\Http\Controllers;

use App\Models\CustomerEventeLog;
use App\Models\CustomerInformation;
use Illuminate\Http\Request;
use App\Http\Resources\CustomersResource;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Hash;

class CustomerInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returning all cutomers
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
        // validating requested data
        $request->validate([
            'customer_first_name' => 'required|string|max:50',
            'customer_middle_name' => 'required|string|max:50',
            'customer_last_name' => 'required|string|max:50',
            'customer_phone' => 'required|string|unique:App\Models\CustomerInformation,customer_phone',
            "customer_region" => 'required|string',
            "customer_town" => 'required|string',
            "customer_kebele" => 'required|string',
            "customer_house_no" => 'required|string',
            'customer_username' => 'required|string|unique:App\Models\CustomerAccount,customer_username',
            'customer_password' => 'required|string|confirmed'
        ]);
        // creating  instance of customer
        $data = new CustomerInformation([
            'customer_first_name' => $request->get('customer_first_name'),
            'customer_middle_name' => $request->get('customer_middle_name'),
            'customer_last_name' => $request->get('customer_last_name'),
            'customer_phone' => $request->get('customer_phone'),
            'customer_region'=> $request->get('customer_region'),
            'customer_town'=> $request->get('customer_town'),
            'customer_kebele'=> $request->get('customer_kebele'),
            'customer_house_no'=> $request->get('customer_house_no')
        ]);

        // saving the data instance
        $data->save();

        // creating account instance
        $data_account = new CustomerAccount([
            'customer_id' => $data->customer_id,
            'customer_username' => $request->get('customer_username'),
            'customer_password' => Hash::make($request->get('customer_password'))
        ]);

        // saving the data_account instance
        $data_account->save();
        
        // returning resource instance of customer
        return new CustomersResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // returning single customer resource instance
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
        // validating requested data
        $request->validate([
            'customer_first_name' => 'string|max:50',
            'customer_middle_name' => 'string|max:50',
            'customer_last_name' => 'string|max:50',
            'customer_phone' => 'string|unique:App\Models\CustomerInformation,customer_phone',
            "customer_region" => 'string',
            "customer_town" => 'string',
            "customer_kebele" => 'string',
            "customer_house_no" => 'string',
            'customer_username' => 'string|unique:App\Models\CustomerAccount,customer_username',
            'customer_password' => 'string|confirmed'
        ]);

        // creating instance of customer
        $data = CustomerInformation::find($id);

        // updating customer information
        $data->update([
            'customer_first_name' => ($request->get('customer_first_name')==null)?$data->customer_first_name:$request->get('customer_first_name'),
            'customer_middle_name' =>  ($request->get('customer_middle_name')==null)?$data->customer_middle_name:$request->get('customer_middle_name'),
            'customer_last_name' =>  ($request->get('customer_last_name')==null)?$data->customer_last_name:$request->get('customer_last_name'),
            'customer_phone' =>  ($request->get('customer_phone')==null)?$data->customer_phone:$request->get('customer_phone'),
            "customer_region" =>  ($request->get('customer_region')==null)?$data->customer_region:$request->get('customer_region'),
            "customer_town" => ($request->get('customer_town')==null)?$data->customer_town:$request->get('customer_town'),
            "customer_kebele" =>  ($request->get('customer_kebele')==null)?$data->customer_kebele:$request->get('customer_kebele'),
            "customer_house_no" =>  ($request->get('customer_house_no')==null)?$data->customer_house_no:$request->get('customer_house_no'),
        ]);

        // updating customer account
        $data->customerAccount->update([
            'customer_username' => ($request->get('customer_username')==null)?$data->customerAccount->customer_username:$request->get('customer_username'),
            'customer_password' => $request->get('customer_password')?$data->customerAccount->customer_password:Hash::make($request->get('customer_password'))
        ]);

        // returning resource instance of customer
        return new CustomersResource($data);

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
