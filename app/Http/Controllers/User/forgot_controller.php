<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\user_otp;

class forgot_controller extends Controller
{
    public function index(){
        if (session()->get('user_id')) { return redirect('/dashboard/user'); }else{return view('user.forgot.find');}
    }
    public function Find(Request $request){
        $find = DB::table('user')->select('user_id','code')->whereemail($request->email)->get();
        $count = count($find);
        if ($count != 0) {
            $otp = mt_rand(100000, 999999);
            $update = DB::table('user')->whereuser_id($find[0]->user_id)->update(['otp' => $otp,'verified' => 0]);
            if (Str::contains(request()->getHttpHost(), 'com') == true OR Str::contains(request()->getHttpHost(), 'au') == true) {
                $detail = ['otp' => $otp]; mail::to($request->email)->send(new user_otp($detail));
            }return response()->json(['error'=>false,'code'=>$find[0]->code]);
        }else{return response()->json(['error'=>true]);}
    }
    public function Verification_Page($code){return view('user.forgot.verify',['code'=>$code]);}
    public function Check(Request $request){
        $check = count(DB::table('user')->select('user_id')->where([['code','=',$request->code],['otp','=',$request->otp]])->get());
        if ($check != 0){
            return response()->json(['error'=>false,'code'=>$request->code]);
        }else{return response()->json(['error'=>true,'message'=>'Wrong Otp']);}
    }
    public function Change_Password_Page($code){return view('user.forgot.change',['code'=>$code]);}
    public function Change(Request $request){
        $update = DB::table('user')->wherecode($request->code)->update(['password' => Hash::make($request->password),'verified' => 1]);
        return response()->json(['error'=>false]);
    }
}
