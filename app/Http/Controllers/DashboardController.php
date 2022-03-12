<?php

namespace App\Http\Controllers;

use App\Models\ActiveBill;
use App\Models\CustomerInformation;
use App\Models\HistoryBill;
use App\Models\SpcInformation;
use App\Models\SpEmployeeInformation;
use App\Models\SpInformation;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DashboardController extends Controller
{
    public function getCount($case)
    {
        $data = [];
        if ($case === "spc") {
            $data = SpcInformation::all();
        } else if ($case === "sp") {
            $data = SpInformation::all();
        } else if ($case === "tech") {
            $data = SpEmployeeInformation::all();
        } else if ($case === "customer") {
            $data = CustomerInformation::all();
        } else if ($case === "all") {
            return [$this->getCount("spc"), $this->getCount("sp"), $this->getCount("tech"), $this->getCount("customer")];
        }

        return count($data);
    }

    public function getAllActiveMonthIncome($month)
    {
        $datas = ActiveBill::whereMonth('ac_month_year', '=', $month)->get();
        $count = 0;
        foreach ($datas as $data) {
            $count += $data->ac_amount_birr;
        }
        return $count;
    }

    public function getAllHistoryMonthIncome($month)
    {
        $datas = HistoryBill::whereMonth('hs_month_year', '=', $month)->get();
        $count = 0;
        foreach ($datas as $data) {
            $count += $data->hs_amount_birr;
        }
        return $count;
    }
}
