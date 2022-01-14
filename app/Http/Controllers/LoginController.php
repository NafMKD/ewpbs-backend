<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdminAccount;
use App\Models\CustomerAccount;
use App\Models\SpcAccount;
use App\Models\SpAccount;
use App\Models\SpEmployeeAccount;
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

        if(!$data_admin || !Hash::check($request->get('password'), $data_admin->admin_password)){

            $data_customer = CustomerAccount::where('customer_username', $request->get('username'))->first();
            if(!$data_customer || !Hash::check($request->get('password'), $data_customer->customer_password)){

                $data_spc = SpcAccount::where('spc_username', $request->get('username'))->first();
                if(!$data_spc || !Hash::check($request->get('password'), $data_spc->spc_password)){

                    $data_sp = SpAccount::where('sp_username', $request->get('username'))->first();
                    if(!$data_sp || !Hash::check($request->get('password'), $data_sp->sp_password)){

                        $data_emp = SpEmployeeAccount::where('sp_emp_username', $request->get('username'))->first();
                        if(!$data_emp || !Hash::check($request->get('password'), $data_emp->sp_emp_password)){

                            //err
                            $response = [
                                'status' => 'error',
                                'message' => 'Invalida username or password',
                            ];
                        }else{
                            //pass emp
                            

                            $response = [
                                'status' => 'success',
                                'type' => 'spemployee',
                                'account_id' => $data_emp->sp_emp_id,
                                
                            ];
                        }
                    }else{
                        //pass sp
                        

                        $response = [
                            'status' => 'success',
                            'type' => 'sp',
                            'account_id' => $data_sp->sp_id,
                            
                        ];
                    }
                }else{
                    //pass spc
                    

                    $response = [
                        'status' => 'success',
                        'type' => 'spc',
                        'account_id' => $data_spc->spc_id,
                        
                    ];
                }
            }else{
                //pass customer
                

                $response = [
                    'status' => 'success',
                    'type' => 'customer',
                    'account_id' => $data_customer->customer_id,
                    
                ];
            }
        }else{
            //pass admin
            

            $response = [
                'status' => 'success',
                'type' => 'admin',
                'account_id' => $data_admin->admin_id,
                
            ];
        }

        return $response;
    }

}
