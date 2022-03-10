<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use App\Models\AdminInformation;
use App\Models\CustomerInformation;
use Illuminate\Support\Facades\Hash;


class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returning all admin
        return AdminInformation::all();
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
            'admin_first_name'=> 'required|string|max:50',
            'admin_last_name'=> 'required|string|max:50',
            'admin_phone'=> 'required|string|unique:App\Models\AdminInformation,admin_phone',
            'admin_username'=>'required|string|unique:App\Models\AdminAccount,admin_username',
            'admin_password'=>'required|string|confirmed'
        ]);

        // creating instance of admin
        $data = new AdminInformation([
            'admin_first_name'=>$request->get('admin_first_name'),
            'admin_last_name'=>$request->get('admin_last_name'),
            'admin_phone'=>$request->get('admin_phone'),
        ]);
        // saving instance of admin
        $data->save();

        //creating account instant
        $data_account = new AdminAccount([
            'admin_id'=> $data->admin_id,
            'admin_username'=>$request->get('admin_username'),
            'admin_password'=> Hash::make($request->get('admin_password'))
        ]);

        // saving account instant
        $data_account->save();

        // returning resource instant of admin
        return new AdminResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //returning single Admin resource instance
        return new AdminResource(AdminInformation::find($id));
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
            'admin_first_name'=> 'string|max:50',
            'admin_last_name'=> 'string|max:50',
            'admin_phone'=> 'string|unique:App\Models\AdminInformation,admin_phone',
            'admin_username'=>'string|unique:App\Models\AdminAccount,admin_username',
            'admin_password,'=>'string|confirmed'
        ]);

        // creating instance of Admin

        $data =AdminInformation::find($id);

        // updating Admin information

        $data->update([
            'admin_first_name'=>($request->get('admin_first_name')==null)?$data->admin_first_name:$request->get('admin_first_name'),
            'admin_last_name'=>($request->get('admin_last_name')==null)?$data->admin_last_name:$request->get('admin_last_name'),
            'admin_phone'=>($request->get('admin_phone')==null)?$data->admin_phone:$request->get('admin_phone'),
        ]);

        // updating Admin account;

        $data->adminAccount->update([
            'admin_username'=>($request->get('admin_username')==null)?$data->adminAccount->admin_username:$request->get('admin_username'),
            'admin_password'=> ($request->get('admin_password')==null)?$data->adminAccount->admin_password:Hash::make($request->get('admin_password')),
        ]);

        // returning Resource instance of Admin
        return new AdminResource($data);

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
