<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class register_controller extends Controller
{
    public function index(){
        if (session()->get("user_id")) {
            return redirect('/dashboard/user');
        }else{return view('user.register.index');}
    }
    public function Insert(Request $request){
        if (session()->get("user_id")) {return redirect('/dashboard/user');}else{
            $Delete_UnVerified_Account = DB::table('user')->where([['email',$request->email],['verified',0]])->delete();
            $Check_Email = DB::table('user')->whereemail($request->email)->count();
            if ($Check_Email != 0) { return response()->json(['error' => true,'message'=>'Email Is Allready Taken!']); }
            $Insert = DB::table('user')->insert(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    // 'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $otp = mt_rand(100000, 999999); $user_id = DB::getPdo()->lastInsertId();
            $Update = DB::table('user')->whereuser_id($user_id)->update(['code' => md5($user_id),'otp'=>$otp]);
            $response = Http::post('https://magnatehub.elliptical.website/api/SEND/OTP', [
                'email' => $request->email,
                'otp' => $otp,
            ]);
            return response()->json(['error' => false,'code'=>md5($user_id)]);
        }
    }
    public function Verification_Page($code){
        if (session()->get("user_id")) {return redirect('/dashboard/user');}else{
            $Check = DB::table('user')->where([['code',$code],['otp','!=',0],['verified',0]])->count();
            if ($Check == 0) { return response()->json(['error' => true,'message'=>'Account Not Found']); }
            else{return view("user.register.verify",['code'=>$code]);}
        }
    }
    public function Check(Request $request){
        $Check = DB::table('user')->where([['code',$request->code],['otp',$request->otp],['verified',0]])->count();
        if ($Check == 0) {return response()->json(['error' => true,'message'=>'Wrong Otp']);}

        $Update = DB::table('user')->wherecode($request->code)->update(['otp' => 0,'verified' => 1]);
        // Make Login
        $Account = DB::table('user')->select('name','user_id','email')->wherecode($request->code)->get();
        $request->session()->put('user_id', $Account[0]->user_id);
        $request->session()->put('name', $Account[0]->name);
        $request->session()->put('email', $Account[0]->email);
        return response()->json(['error' => false,'message'=>'Verified']);
    }
    public function Resend(Request $request){
        $Check = DB::table('user')->where([['code',$request->code],['otp','!=',0],['verified',0]])->count();
        if ($Check == 0) { return response()->json(['error' => true,'message'=>'Account Not Found']); }

        $otp = mt_rand(100000, 999999);
        $update = DB::table('user')->wherecode($request->code)->update(['otp' => $otp]);
        $user = DB::table('user')->select('email')->wherecode($request->code)->get();
        $response = Http::post('https://magnatehub.elliptical.website/api/SEND/OTP', [
            'email' => $user[0]->email,
            'otp' => $otp,
        ]);
        return response()->json(['error'=>false]);
    }
}
