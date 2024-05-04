<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class register_controller extends Controller
{
    public function index1(){ return view('raising.register.index',['profile' => 1]);}
    public function index2(){ return view('raising.register.index',['profile' => 2]);}
    public function Insert(Request $request){
        if (session()->get("raising_id")) {return redirect('/dashboard/professionals/');}else{
            $Delete_UnVerified_Account = DB::table('raising')->where([['email',$request->email],['verified',0]])->delete();
            $Check_Email = DB::table('raising')->whereemail($request->email)->count();
            if ($Check_Email != 0) { return response()->json(['error' => true,'message'=>'Email Is Allready Taken!']); }
            $Insert = DB::table('raising')->insert(
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    // 'phone' => $request->phone,
                    // 'gender' => $request->gender,
                    'type' => $request->type,
                    // 'nationality' => $request->nationality,
                    // 'earning' => $request->earning,
                    // 'net_worth' => $request->net_worth,
                    // 'passport' => $request->passport,
                    // 'identification' => $request->identification,
                    // 'tin' => $request->tin,
                    'password' => Hash::make($request->password),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $otp = mt_rand(100000, 999999); $raising_id = DB::getPdo()->lastInsertId();
            $Update = DB::table('raising')->whereraising_id($raising_id)->update(['code' => md5($raising_id),'otp'=>$otp]);
            $response = Http::post('https://magnatehub.elliptical.website/api/SEND/OTP', [
                'email' => $request->email,
                'otp' => $otp,
            ]);
            return response()->json(['error' => false,'code'=>md5($raising_id)]);
        }
    }
    public function Verification_Page($code){
        if (session()->get("raising_id")) {return redirect('/dashboard/professionals/');}else{
            $Check = DB::table('raising')->where([['code',$code],['otp','!=',0],['verified',0]])->count();
            if ($Check == 0) { return response()->json(['error' => true,'message'=>'Account Not Found']); }
            else{return view("raising.register.verify",['code'=>$code]);}
        }
    }
    public function Check(Request $request){
        $Check = DB::table('raising')->where([['code',$request->code],['otp',$request->otp],['verified',0]])->count();
        if ($Check == 0) {return response()->json(['error' => true,'message'=>'Wrong Otp']);}

        $Update = DB::table('raising')->wherecode($request->code)->update(['otp' => 0,'verified' => 1]);
        // Make Login
        $Account = DB::table('raising')->select('first_name','last_name','raising_id','email','profile','type')->wherecode($request->code)->get();
        $request->session()->put('raising_id', $Account[0]->raising_id);
        $request->session()->put('name', $Account[0]->first_name.' '.$Account[0]->last_name);
        $request->session()->put('email', $Account[0]->email);
        $request->session()->put('profile', $Account[0]->profile);
        $request->session()->put('type', $Account[0]->type);

        $E_Plan = DB::table('plan')->select('type','expiry','plan_id')->where([['expiry','>=',date('Y-m-d')],['raising_id',$Account[0]->raising_id],['type','=',1]])->get();
        $O_Plan = DB::table('plan')->select('type','expiry','plan_id')->where([['status','=',0],['raising_id',$Account[0]->raising_id],['type','!=',1]])->get();
        
        
        if (count($E_Plan) != 0) {
        $request->session()->put('plan_type', $E_Plan[0]->type);
        $request->session()->put('plan_expiry', $E_Plan[0]->expiry);
        $plan_id = $E_Plan[0]->plan_id;}

        if (count($O_Plan) != 0) {
            $request->session()->put('plan_type', $O_Plan[0]->type);
            $request->session()->put('plan_expiry', $O_Plan[0]->expiry);
        $plan_id = $O_Plan[0]->plan_id;}
        
        if (count($O_Plan) == 0 && count($E_Plan) == 0) { 
            $request->session()->put('plan_type', 0);
        }else{ $Expire_Old = DB::table('plan')->where([['plan_id','!=',$plan_id],['raising_id',$Account[0]->raising_id]])->update(['status' => 1]); }


        return response()->json(['error' => false,'message'=>'Verified']);
    }
    public function Resend(Request $request){
        $Check = DB::table('raising')->where([['code',$request->code],['otp','!=',0],['verified',0]])->count();
        if ($Check == 0) { return response()->json(['error' => true,'message'=>'Account Not Found']); }

        $otp = mt_rand(100000, 999999);
        $update = DB::table('raising')->wherecode($request->code)->update(['otp' => $otp]);
        $raising = DB::table('raising')->select('email')->wherecode($request->code)->get();
        $response = Http::post('https://magnatehub.elliptical.website/api/SEND/OTP', [
            'email' => $raising[0]->email,
            'otp' => $otp,
        ]);
        return response()->json(['error'=>false]);
    }
}
