<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpResource;
use App\Models\ActiveBill;
use App\Models\CustomerInformationSpInformation;
use App\Models\HistoryBill;
use App\Models\SpAccount;
use App\Models\SpEmployeeInformation;
use App\Models\SpInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SpInformaionContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returning resource instance of sp
        return SpInformation::all();
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
            'spc_id' => 'required|numeric|exists:App\Models\SpcInformation,spc_id',
            'sp_name' => 'required',
            'sp_region' => 'string',
            'sp_zone' => 'string',
            'sp_town' => 'string',
            'sp_username' => 'required|string|unique:App\Models\SpAccount,sp_username|max:50',
            'sp_password' => 'required|confirmed'
        ]);

        // creating instance pf sc
        $data = new SpInformation([
            'spc_id' => $request->get('spc_id'),
            'sp_name' => $request->get('sp_name'),
            'sp_region' => $request->get('sp_region'),
            'sp_zone' => $request->get('sp_zone'),
            'sp_town' => $request->get('sp_town')
        ]);

        // saving instance of new sp
        $data->save();

        // creating account instance
        $data_account = new SpAccount([
            'sp_id' => $data->sp_id,
            'sp_username' => $request->get('sp_username'),
            'sp_password' => Hash::make($request->get('sp_password')),
        ]);

        //saving account instance
        $data_account->save();

        // returnig new instance data
        return new SpResource($data);
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
        return new SpResource(SpInformation::find($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function spcShow($id)
    {
        // returning resource instance of sp 
        return SpInformation::where('spc_id', $id)->get();
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
            'sp_name' => 'string',
            'sp_region' => 'string',
            'sp_zone' => 'string',
            'sp_town' => 'string',
            'sp_username' => 'string|unique:App\Models\SpAccount,sp_username|max:50',
            'sp_password' => 'string|confirmed'
        ]);

        // creating instance of sp
        $data = SpInformation::find($id);

        // updating sp instance
        $data->update([
            'sp_name' => ($request->get('sp_name') == null) ? $data->sp_name : $request->get('sp_name'),
            'sp_region' => ($request->get('sp_region') == null) ? $data->sp_region : $request->get('sp_region'),
            'sp_zone' => ($request->get('sp_zone') == null) ? $data->sp_zone : $request->get('sp_zone'),
            'sp_town' => ($request->get('sp_town') == null) ? $data->sp_town : $request->get('sp_town')
        ]);

        // updating sp account instance
        $data->spAccount->update([
            'sp_username' => ($request->get('sp_username') == null) ? $data->spAccount->sp_username : $request->get('sp_username'),
            'sp_password' => ($request->get('sp_password') == null) ? $data->spAccount->sp_password : Hash::make($request->get('sp_password'))
        ]);

        // returning updated instance
        return new SpResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dashboard($id)
    {
        //
        $cus_c = 0;
        $tech_c = 0;
        $customer = CustomerInformationSpInformation::where('sp_id', $id)->get();
        $dataemp = SpEmployeeInformation::where('sp_id', $id)->get();
        foreach ($customer as $dc) {
            $cus_c++;
        }
        foreach ($dataemp as $de) {
            $tech_c++;
        }
        return [$cus_c, $tech_c];
    }

    public function dashboardBill($id, $month)
    {
        $activeBill = 0;
        $historyBill = 0;

        $datacust = ActiveBill::where('sp_id', $id)->whereMonth('ac_month_year', '=', $month)->get();
        $dataemp = HistoryBill::where('sp_id', $id)->whereMonth('hs_month_year', '=', $month)->get();
        foreach ($datacust as $dc) {
            $activeBill += $dc->ac_amount_birr;
        }
        foreach ($dataemp as $de) {
            $historyBill += $de->hs_amount_birr;
        }
        $all =  $activeBill + $historyBill;
        return [$all, $activeBill, $historyBill];
    }
}
