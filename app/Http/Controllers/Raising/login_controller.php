<?php

namespace App\Http\Controllers\raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\raising_otp;

class login_controller extends Controller
{
    public function index(){if (session()->get("raising_id")) { return redirect('/dashboard/professionals/');}else{return view('raising.login.index');}}
    public function Check(Request $request){
    $Check = DB::table('raising')->whereemail($request->email)->count();
    if ($Check != 0) {
        $raising = DB::table('raising')->select('password','code','status','verified')->whereemail($request->email)->get();
        if ($raising[0]->status == 1) {
            return response()->json(['error'=>true,'message'=>'Account Has Been Blocked']);
        }else{
            if (Hash::check($request->password, $raising[0]->password)){
                if ($raising[0]->verified == 0) {
                    $otp = mt_rand(100000, 999999);
                    $Update_OTP = DB::table('raising')->wherecode($raising[0]->code)->update(['otp' => $otp]);
                    if (Str::contains(request()->getHttpHost(), 'com') == true OR Str::contains(request()->getHttpHost(), 'au') == true) {
                        $detail = ['otp' => $otp]; mail::to($request->email)->send(new raising_otp($detail));
                    } return response()->json(['error'=>true,'code'=>$raising[0]->code,'message'=>'Account Not Verified']);
                }else{
                    $Account = DB::table('raising')->select('first_name','last_name','raising_id','email','profile','type')->wherecode($raising[0]->code)->get();
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

                    return response()->json(['error'=>false]);
                }
            }else{ return response()->json(['error'=>true,'message'=>'Wrong Password Try Another One!']);}
        }
    }else{ return response()->json(['error'=>true,'message'=>'Wrong Email Try Another One!']); }}
    
    
    public function logout(Request $request){$request->session()->forget('raising_id'); $request->session()->forget('name'); $request->session()->forget('email'); $request->session()->forget('profile'); $request->session()->forget('plan_type'); $request->session()->forget('profile'); $request->session()->forget('type'); $request->session()->forget('plan_expiry'); return redirect("/login/professionals/");
    
    }
}
