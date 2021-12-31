<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpEmployeeResource;
use App\Models\SpEmployeeAccount;
use App\Models\SpEmployeeInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SpEmployeeInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // returning resource instance of sp
         return SpEmployeeInformation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valdaation of requested data
        $request->validate([
            'sp_id'=>'required|numeric|exists:App\Models\SpInformation,spc_id',	
            'sp_emp_first_name'=> 'required|string',
            'sp_emp_middle_name' => 'required|string',	
            'sp_emp_last_name' => 'required|string',	
            'sp_emp_region' => 'string',
            'sp_emp_town' => 'string',
            'sp_emp_phone' => 'required|string|unique:App\Models\SpEmployeeInformation,sp_emp_phone',
            'sp_emp_house_no' => 'string',
            'sp_emp_username' => 'required|string|unique:App\Models\SpEmployeeAccount,sp_emp_username|max:50',
            'sp_emp_password' => 'required|string|confirmed'
        ]);

        // creating instance pf sp employee
        $data = new SpEmployeeInformation([
            'sp_id'=> $request->get('sp_id'),	
            'sp_emp_first_name'=> $request->get('sp_emp_first_name'),
            'sp_emp_middle_name' => $request->get('sp_emp_middle_name'),	
            'sp_emp_last_name' => $request->get('sp_emp_last_name'),	
            'sp_emp_region' => $request->get('sp_emp_region'),
            'sp_emp_town' => $request->get('sp_emp_town'),	
            'sp_emp_phone' => $request->get('sp_emp_phone'),	
            'sp_emp_house_no' => $request->get('sp_emp_house_no')
        ]);

        // saving instance of new sp employee
        $data->save();

        // creating account instance
        $data_account = new SpEmployeeAccount([
            'sp_emp_id' => $data->sp_id,	
            'sp_emp_username' => $request->get('sp_emp_username'),	
            'sp_emp_password' => Hash::make($request->get('sp_emp_password')),   
        ]);

        //saving account instance
        $data_account->save();

        // returnig new instance data
        return new SpEmployeeResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // returning resource instance of sp 
        return new SpEmployeeResource(SpEmployeeInformation::find($id));
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
        // validation of requested data
        $request->validate([
            'sp_emp_first_name'=> 'string',
            'sp_emp_middle_name' => 'string',	
            'sp_emp_last_name' => 'string',	
            'sp_emp_region' => 'string',
            'sp_emp_town' => 'string',
            'sp_emp_phone' => 'string|unique:App\Models\SpEmployeeInformation,sp_emp_phone',
            'sp_emp_house_no' => 'string',
            'sp_emp_username' => 'string|unique:App\Models\SpEmployeeAccount,sp_emp_username|max:50',
            'sp_emp_password' => 'string|confirmed'
        ]);

        // creating instance of sp employee
        $data = SpEmployeeInformation::find($id);

        // updating sp instance
        $data->update([
            'sp_emp_first_name'=> ($request->get('sp_emp_first_name')==null)?$data->sp_emp_first_name:$request->get('sp_emp_first_name'),
            'sp_emp_middle_name' => ($request->get('sp_emp_middle_name')==null)?$data->sp_emp_middle_name:$request->get('sp_emp_middle_name'),	
            'sp_emp_last_name' => ($request->get('sp_emp_last_name')==null)?$data->sp_emp_last_name:$request->get('sp_emp_last_name'),	
            'sp_emp_region' => ($request->get('sp_emp_region')==null)?$data->sp_emp_region:$request->get('sp_emp_region'),
            'sp_emp_town' => ($request->get('sp_emp_town')==null)?$data->sp_emp_town:$request->get('sp_emp_town'),	
            'sp_emp_phone' => ($request->get('sp_emp_phone')==null)?$data->sp_emp_phone:$request->get('sp_emp_phone'),	
            'sp_emp_house_no' => ($request->get('sp_emp_house_no')==null)?$data->sp_emp_house_no:$request->get('sp_emp_house_no')
        ]);

        // updating sp employee account instance
        $data->spEmployeeAccount->update([
            'sp_emp_username' => ($request->get('sp_emp_username')==null)?$data->spEmployeeAccount->sp_emp_username:$request->get('sp_emp_username'),	
            'sp_emp_password' => ($request->get('sp_emp_password')==null)?$data->spEmployeeAccount->sp_emp_password:Hash::make($request->get('sp_emp_password'))
        ]);

        // returning updated instance
        return new SpEmployeeResource($data);
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
