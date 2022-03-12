<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use App\Models\CustomerAccount;
use App\Models\SpAccount;
use App\Models\SpcAccount;
use App\Models\SpEmployeeAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminAccount(Request $request, $id)
    {
        //
        // validating requested data
        $request->validate([
            'admin_username' => 'string|unique:App\Models\AdminAccount,admin_username',
            'old_admin_password' => 'string',
            'admin_password' => 'string|confirmed'
        ]);
        $data = AdminAccount::where('admin_id', $id)->first();
        if ($request->get('old_admin_password') !== null) {
            if (!Hash::check($request->get('old_admin_password'), $data->admin_password)) {
                return response([
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "old_admin_password" => [
                            "Old Password Didn't Match."
                        ]
                    ]
                ], 422);
            } else {
                $data->update([
                    'admin_username' => ($request->get('admin_username') == null) ? $data->admin_username : $request->get('admin_username'),
                    'admin_password' => ($request->get('admin_password') == null) ? $data->admin_password : Hash::make($request->get('admin_password')),
                ]);
            }
        } else {
            $data->update([
                'admin_username' => ($request->get('admin_username') == null) ? $data->admin_username : $request->get('admin_username')
            ]);
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerAccount(Request $request, $id)
    {
        //
        // validating requested data
        $request->validate([
            'customer_username' => 'string|unique:App\Models\CustomerAccount,customer_username',
            'old_customer_password' => 'string',
            'customer_password' => 'string|confirmed'
        ]);
        $data = CustomerAccount::where('customer_id', $id)->first();
        if ($request->get('old_customer_password') !== null) {
            if (!Hash::check($request->get('old_customer_password'), $data->customer_password)) {
                return response([
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "old_customer_password" => [
                            "Old Password Didn't Match."
                        ]
                    ]
                ], 422);
            } else {
                $data->update([
                    'customer_username' => ($request->get('customer_username') == null) ? $data->customer_username : $request->get('customer_username'),
                    'customer_password' => ($request->get('customer_password') == null) ? $data->customer_password : Hash::make($request->get('customer_password')),
                ]);
            }
        } else {
            $data->update([
                'customer_username' => ($request->get('customer_username') == null) ? $data->customer_username : $request->get('customer_username')
            ]);
        }
        return $data;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spAccount(Request $request, $id)
    {
        //
        // validating requested data
        $request->validate([
            'sp_username' => 'string|unique:App\Models\SpAccount,sp_username',
            'old_sp_password' => 'string',
            'sp_password' => 'string|confirmed'
        ]);
        $data = SpAccount::where('sp_id', $id)->first();
        if ($request->get('old_sp_password') !== null) {
            if (!Hash::check($request->get('old_sp_password'), $data->sp_password)) {
                return response([
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "old_sp_password" => [
                            "Old Password Didn't Match."
                        ]
                    ]
                ], 422);
            } else {
                $data->update([
                    'sp_username' => ($request->get('sp_username') == null) ? $data->sp_username : $request->get('sp_username'),
                    'sp_password' => ($request->get('sp_password') == null) ? $data->sp_password : Hash::make($request->get('sp_password')),
                ]);
            }
        } else {
            $data->update([
                'sp_username' => ($request->get('sp_username') == null) ? $data->sp_username : $request->get('sp_username')
            ]);
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spcAccount(Request $request, $id)
    {
        //
        // validating requested data
        $request->validate([
            'spc_username' => 'string|unique:App\Models\SpcAccount,spc_username',
            'old_spc_password' => 'string',
            'spc_password' => 'string|confirmed'
        ]);
        $data = SpcAccount::where('spc_id', $id)->first();
        if ($request->get('old_spc_password') !== null) {
            if (!Hash::check($request->get('old_spc_password'), $data->spc_password)) {
                return response([
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "old_spc_password" => [
                            "Old Password Didn't Match."
                        ]
                    ]
                ], 422);
            } else {
                $data->update([
                    'spc_username' => ($request->get('spc_username') == null) ? $data->spc_username : $request->get('spc_username'),
                    'spc_password' => ($request->get('spc_password') == null) ? $data->spc_password : Hash::make($request->get('spc_password')),
                ]);
            }
        } else {
            $data->update([
                'spc_username' => ($request->get('spc_username') == null) ? $data->spc_username : $request->get('spc_username')
            ]);
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spEmployeeAccount(Request $request, $id)
    {
        //
        // validating requested data
        $request->validate([
            'sp_emp_username' => 'string|unique:App\Models\SpEmployeeAccount,sp_emp_username',
            'old_sp_emp_password' => 'string',
            'sp_emp_password' => 'string|confirmed'
        ]);
        $data = SpEmployeeAccount::where('sp_emp_id', $id)->first();
        if ($request->get('old_sp_emp_password') !== null) {
            if (!Hash::check($request->get('old_sp_emp_password'), $data->sp_emp_password)) {
                return response([
                    "message" => "The given data was invalid.",
                    "errors" => [
                        "old_sp_emp_password" => [
                            "Old Password Didn't Match."
                        ]
                    ]
                ], 422);
            } else {
                $data->update([
                    'sp_emp_username' => ($request->get('sp_emp_username') == null) ? $data->sp_emp_username : $request->get('sp_emp_username'),
                    'sp_emp_password' => ($request->get('sp_emp_password') == null) ? $data->sp_emp_password : Hash::make($request->get('sp_emp_password')),
                ]);
            }
        } else {
            $data->update([
                'sp_emp_username' => ($request->get('sp_emp_username') == null) ? $data->sp_emp_username : $request->get('sp_emp_username')
            ]);
        }
        return $data;
    }
}
