<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdminAccount;
use App\Models\AdminInformation;
use App\Models\CustomerAccount;
use App\Models\CustomerInformation;
use App\Models\SpcAccount;
use App\Models\SpAccount;
use App\Models\SpcInformation;
use App\Models\SpEmployeeAccount;
use App\Models\SpEmployeeInformation;
use App\Models\SpInformation;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logOut()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logIn(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $response = [];

        $data_admin = AdminAccount::where('admin_username', $request->get('username'))->first();

        if (!$data_admin || !Hash::check($request->get('password'), $data_admin->admin_password)) {

            $data_customer = CustomerAccount::where('customer_username', $request->get('username'))->first();
            if (!$data_customer || !Hash::check($request->get('password'), $data_customer->customer_password)) {

                $data_spc = SpcAccount::where('spc_username', $request->get('username'))->first();
                if (!$data_spc || !Hash::check($request->get('password'), $data_spc->spc_password)) {

                    $data_sp = SpAccount::where('sp_username', $request->get('username'))->first();
                    if (!$data_sp || !Hash::check($request->get('password'), $data_sp->sp_password)) {

                        $data_emp = SpEmployeeAccount::where('sp_emp_username', $request->get('username'))->first();
                        if (!$data_emp || !Hash::check($request->get('password'), $data_emp->sp_emp_password)) {

                            //err
                            $response = [
                                'status' => 'error',
                                'message' => 'Invalid username or password',
                            ];
                        } else {
                            //pass emp
                            $date = \Carbon\Carbon::now()->toDateTimeString();
                            $data = SpEmployeeInformation::find($data_emp->sp_emp_id);
                            $data->spEmployeeAccount->update([
                                'sp_emp_last_login' => $date,
                            ]);

                            $response = [
                                'status' => 'success',
                                'type' => 'spemployee',
                                'account_id' => $data_emp->sp_emp_id,

                            ];
                        }
                    } else {
                        //pass sp
                        $date = \Carbon\Carbon::now()->toDateTimeString();
                        $data = SpInformation::find($data_sp->sp_id);
                        $data->spAccount->update([
                            'sp_last_login' => $date,
                        ]);

                        $response = [
                            'status' => 'success',
                            'type' => 'sp',
                            'account_id' => $data_sp->sp_id,

                        ];
                    }
                } else {
                    //pass spc
                    $date = \Carbon\Carbon::now()->toDateTimeString();
                    $data = SpcInformation::find($data_spc->spc_id);
                    $data->spcAccount->update([
                        'spc_last_login' => $date,
                    ]);

                    $response = [
                        'status' => 'success',
                        'type' => 'spc',
                        'account_id' => $data_spc->spc_id,

                    ];
                }
            } else {
                //pass customer
                $date = \Carbon\Carbon::now()->toDateTimeString();
                $data = CustomerInformation::find($data_customer->customer_id);
                $data->customerAccount->update([
                    'customer_last_login' => $date,
                ]);

                $response = [
                    'status' => 'success',
                    'type' => 'customer',
                    'account_id' => $data_customer->customer_id,

                ];
            }
        } else {
            //pass admin
            $date = \Carbon\Carbon::now()->toDateTimeString();
            $data = AdminInformation::find($data_admin->admin_id);
            $data->adminAccount->update([
                'admin_last_login' => $date,
            ]);

            $response = [
                'status' => 'success',
                'type' => 'admin',
                'account_id' => $data_admin->admin_id,

            ];
        }

        return $response;
    }
}
