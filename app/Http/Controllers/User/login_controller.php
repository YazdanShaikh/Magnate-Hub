<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class login_controller extends Controller
{
    public function index(){if (session()->get("user_id")) { return redirect('/dashboard/user');}else{return view('user.login.index');}}
    public function Check(Request $request){
    $Check = DB::table('user')->whereemail($request->email)->count();
    if ($Check != 0) {
        $user = DB::table('user')->select('password','code','status','verified')->whereemail($request->email)->get();
        if ($user[0]->status == 1) {
            return response()->json(['error'=>true,'message'=>'Account Has Been Blocked']);
        }else{
            if (Hash::check($request->password, $user[0]->password)){
                if ($user[0]->verified == 0) {
                    $otp = mt_rand(100000, 999999);
                    $Update_OTP = DB::table('user')->wherecode($user[0]->code)->update(['otp' => $otp]);
                    if (Str::contains(request()->getHttpHost(), 'com') == true OR Str::contains(request()->getHttpHost(), 'au') == true) {
                        $detail = ['otp' => $otp]; mail::to($request->email)->send(new user_otp($detail));
                    } return response()->json(['error'=>true,'code'=>$user[0]->code,'message'=>'Account Not Verified']);
                }else{
                    $Account = DB::table('user')->select('name','user_id','email','profile')->wherecode($user[0]->code)->get();
                    $request->session()->put('user_id', $Account[0]->user_id);
                    $request->session()->put('name', $Account[0]->name);
                    $request->session()->put('email', $Account[0]->email);
                    $request->session()->put('profile', $Account[0]->profile);
                    return response()->json(['error'=>false]);
                }
            }else{ return response()->json(['error'=>true,'message'=>'Wrong Password Try Another One!']);}
        }
    }else{ return response()->json(['error'=>true,'message'=>'Wrong Email Try Another One!']); }}
    public function logout(Request $request){$request->session()->forget('user_id'); $request->session()->forget('name'); $request->session()->forget('email'); $request->session()->forget('profile'); return redirect("/login");}
}
