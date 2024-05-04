<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Hash;
class setting_controller extends Controller
{
    public function index(){
        if (session()->get("raising_id")) {
            $Raising = DB::table('raising')->whereraising_id(session()->get("raising_id"))->get();
            return view('raising.setting.index',['Raising' => $Raising]);
        }else{ return redirect('/login/professionals/'); }
    }
    public function General(Request $request){
        if (session()->get("raising_id")) {
            $Update = DB::table('raising')->whereraising_id(session()->get("raising_id"))->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                // 'nationality' => $request->nationality,
                // 'phone' => $request->phone,
                'gender' => $request->gender,
            ]);
            if ($request->file('profile')) {
                $profile = $request->file('profile');
                $Get_Prifile = DB::table('raising')->select('profile')->whereraising_id(session()->get("raising_id"))->get();
                if ($Get_Prifile[0]->profile != null) {$Profile_path = public_path().'/uploads/raising/profile/'.$Get_Prifile[0]->profile; if (File::exists($Profile_path)) { unlink($Profile_path);}}
                foreach($profile as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("raising_id").'-'.time().'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/raising/profile/', $imgNameToStore);
                    $Update_profile = DB::table('raising')->whereraising_id(session()->get("raising_id"))->update(['profile' => $imgNameToStore]);
                }
            }
            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{ return redirect('/login/professionals/'); }
    }
    public function Personal(Request $request){
        if (session()->get("raising_id")) {
            $Update = DB::table('raising')->whereraising_id(session()->get("raising_id"))->update([
                'earning' => $request->earning,
                'net_worth' => $request->net_worth,
                'passport' => $request->passport,
                'identification' => $request->identification,
                'tin' => $request->tin,
            ]); return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{ return redirect('/login/professionals/'); }
    }
    public function Password(Request $request){
        if (session()->get("raising_id")) {
            $raising = DB::table('raising')->select('password')->whereraising_id(session()->get("raising_id"))->get();
            if (Hash::check($request->current_password, $raising[0]->password)){
                $Update_Password = DB::table('raising')->whereraising_id(session()->get("raising_id"))->update(['password' => Hash::make($request->new_password)]);
                $request->session()->forget('raising_id'); return response()->json(['error'=>false,'message'=>'Changes Saved Successfully']);
            }else{ return response()->json(['error'=>true,'message'=>'Current Password Is Wrong']); }
        }else{ return response()->json(['error'=>true,'message'=>'session expires']); }
    }
}
