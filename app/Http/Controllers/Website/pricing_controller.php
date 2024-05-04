<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class pricing_controller extends Controller
{
    public function index(){return view('website.pricing.index');}
    public function plan($name){
        if ($name == 'essentials') {$plan = 1;
        }elseif ($name == 'premium') {$plan = 2;
        }elseif ($name == 'enterprise') {$plan = 3;
        }elseif ($name == 'capital-raise') {$plan = 4;
        }else{$plan = 0;}

        return view("website.pricing.plan",['plan' => $plan]);
    }
    public function Get_Plan_Card($plan_id){
        return view("website.include.plan.card",['plan_id' => $plan_id]);
    }
    public function Plan_Buy(Request $request){
        // Expire Old
        $Expire_Old = DB::table('plan')->whereraising_id(session()->get('raising_id'))->update(['status' => 1]);
        // Find Expiry Date
        if ($request->plan_id == 1) {$expiry = date('Y-m-d', strtotime(Carbon::now()->addMonth(6)));}
        else{ $expiry = '0000-00-00'; }

        $Insert_Plan = DB::table('plan')->insert([
            'type' => $request->plan_id,
            'raising_id' => session()->get("raising_id"),
            'expiry' => $expiry,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ]);
        $plan_id = DB::getPdo()->lastInsertId(); $Update_Plan = DB::table('plan')->where('plan_id', '=', $plan_id)->update(['code' => md5($plan_id)]);

        // $Insert_Transaction = DB::table('transaction')->insert([
        //     'raising_id' => session()->get("raising_id"),
        //     'plan_id' => $plan_id,
        //     'name' => $request->name,
        //     'number' => $request->number,
        //     'expiry' => $request->expiry,
        //     'cvc' => $request->cvc,
        //     'date' => date('Y-m-d'),
        //     'time' => date('H:i:s')
        // ]);
        // $transaction_id = DB::getPdo()->lastInsertId(); $Update_Transaction = DB::table('transaction')->where('transaction_id', '=', $transaction_id)->update(['code' => md5($transaction_id)]); $request->session()->put('plan_type', $request->plan_id);

        if (session()->get("raising_id")) {
            $request->session()->put('plan_type', $request->plan_id);
        }

        return response()->json(['error'=>false,'message'=>'Plan Activated Successfully']);
    }
}
