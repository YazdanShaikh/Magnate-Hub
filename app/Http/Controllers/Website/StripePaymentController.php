<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Stripe;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**

 * success response method.

 *

 * @return \Illuminate\Http\Response

 */

    public function stripePost(Request $request){
        if (Str::contains(request()->getHttpHost(), 'com') == true OR Str::contains(request()->getHttpHost(), 'au') == true) { $ip = $request->ip(); }else{ $ip = "141.32.227.255";}
        $Info = Location::get($ip);

        if ($request->plan_id == 1) {$plan = 'Essentials'; $price = 109;
        }elseif ($request->plan_id == 2) {$plan = 'Premium'; $price = 330;
        }elseif ($request->plan_id == 3) {$plan = 'Enterprise'; $price = 1800;
        }elseif ($request->plan_id == 4) {$plan = 'Capital-Raise'; $price = 249;}

        $Raising = DB::table('raising')->select('first_name','last_name','email')->whereraising_id(session()->get("raising_id"))->get();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
            "address" => [
                    "line1" => " ",
                    "postal_code" => $Info->zipCode,
                    "city" => $Info->cityName,
                    "state" => $Info->regionCode,
                    "country" => $Info->countryCode,
                ],
            "email" => $Raising[0]->email,
            "name" => $Raising[0]->first_name.' '.$Raising[0]->last_name,
            "source" => $request->stripeToken
        ));

        Stripe\Charge::create ([
            "amount" => $price * 100,
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "New ".$plan." Plan Sold To ".$Raising[0]->first_name.' '.$Raising[0]->last_name." on ".date('F d Y'),
            "shipping" => [
                "name" =>  $Raising[0]->first_name.' '.$Raising[0]->last_name,
                "address" => [
                    "line1" => " ",
                    "postal_code" => $Info->zipCode,
                    "city" => $Info->cityName,
                    "state" => $Info->regionCode,
                    "country" => $Info->countryCode,
                ],
            ]
        ]);

        Session::flash('success', 'Payment successful!');
        
        // Expire Old
        $Expire_Old = DB::table('plan')->whereraising_id(session()->get('raising_id'))->update(['status' => 1]);
        

        $Insert_Plan = DB::table('plan')->insert([
            'type' => $request->plan_id,
            'raising_id' => session()->get("raising_id"),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ]);
        $plan_id = DB::getPdo()->lastInsertId();
        $Update_Plan = DB::table('plan')->where('plan_id', '=', $plan_id)->update(['code' => md5($plan_id)]);

        if ($request->plan_id == 1) {
        $expiry = date('Y-m-d', strtotime(Carbon::now()->addMonth(6)));
        $Update_Plan = DB::table('plan')->whereplan_id($plan_id)->update(['expiry' => $expiry]);}

        if (session()->get("raising_id")) { $request->session()->put('plan_type', $request->plan_id); }
        
        return redirect('/dashboard/professionals/project');
    }
}
