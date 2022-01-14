<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActiveBill;
use App\Models\HistoryBill;

class ActiveBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returning all active bills
        return ActiveBill::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spShow($id)
    {
        // returning all active bills under sp
        return ActiveBill::where('sp_id', $id)->join('customer_information', 'customer_information.customer_id', 'active_bills.customer_id')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cusomerShow($id)
    {
        // returning all active bills under customer
        return ActiveBill::where('customer_id', $id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating request

        // $request->validate([
        //     'sp_id' => 'required|integer|exists:App\Models\SpInformation,sp_id',
        //     'customer_id' => 'required|integer|exists:App\Models\CustomerInformation,customer_id',
        //     'ac_meter_reading' => 'required|numeric',
        //     'ac_amount_birr' => 'required|numeric',
        //     'ac_month_year' => 'required|numeric',
        //     'ac_reading_date' => 'required',
        // ]);

        // $data = new ActiveBill([
        //     'sp_id' => $request->get('sp_id'),
        //     'customer_id' => $request->get('customer_id'),
        //     'ac_meter_reading' => $request->get('ac_meter_reading'),
        //     'ac_amount_birr' => $request->get('ac_amount_birr'),
        //     'ac_month_year' => $request->get('ac_month_year'),
        //     'ac_reading_date' => $request->get('ac_reading_date')
        // ]);

        // $data->save();

        // return $data;
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
        return ActiveBill::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payBill(Request $request, $id)
    {
        // validating request
        $request->validate([
            'hs_paid_amount' => 'required|numeric',
            'hs_paid_date' => 'required'
        ]);
        // instance of active bill
        $data = ActiveBill::find($id);

        // creating history bill
        $hsdata = new HistoryBill([
            'sp_id' => $data->sp_id,  
            'customer_id'=> $data->customer_id,
            'hs_meter_reading'=> $data->ac_meter_reading,   
            'hs_amount_birr'=> $data->ac_amount_birr, 
            'hs_meter_reading_previous'=> $data->ac_meter_reading_previous, 
            'hs_meter_reading_tarif'=> $data->ac_meter_reading_tarif, 
            'hs_month_year'=> $data->ac_month_year,  
            'hs_paid_amount'=> $request->get('hs_paid_amount'), 
            'hs_paid_date'=> $request->get('hs_paid_date'),   
            'hs_reading_date' => $data->ac_reading_date
        ]);

        // saving to history bill table
        $hsdata->save();

        // deleting from active bill table
        $data->delete();

        return $hsdata;
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
