<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Hash;
class setting_controller extends Controller
{
    public function index(){
        if (session()->get("user_id")) {
            $user = DB::table('user')->whereuser_id(session()->get("user_id"))->get();
            return view('user.setting.index',['user' => $user]);
        }else{ return redirect('/login/user'); }
    }
    public function Location(){
        if (session()->get("user_id")) {
            $location = DB::table('location')->select('location_id','name')->wherestatus(0)->get();
            return response()->json(['location' => $location]);
        }
    }
    public function General(Request $request){
        if (session()->get("user_id")) {
            $Update = DB::table('user')->whereuser_id(session()->get("user_id"))->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            if ($request->file('profile')) {
                $profile = $request->file('profile');
                $Get_Prifile = DB::table('user')->select('profile')->whereuser_id(session()->get("user_id"))->get();
                if ($Get_Prifile[0]->profile != null) {$Profile_path = public_path().'/uploads/user/profile/'.$Get_Prifile[0]->profile; if (File::exists($Profile_path)) { unlink($Profile_path);}}
                foreach($profile as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("user_id").'-'.time().'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/user/profile/', $imgNameToStore);
                    $Update_profile = DB::table('user')->whereuser_id(session()->get("user_id"))->update(['profile' => $imgNameToStore]);
                }
            }
            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{ return redirect('/login/user'); }
    }
    public function Password(Request $request){
        if (session()->get("user_id")) {
            $user = DB::table('user')->select('password')->whereuser_id(session()->get("user_id"))->get();
            if (Hash::check($request->current_password, $user[0]->password)){
                $Update_Password = DB::table('user')->whereuser_id(session()->get("user_id"))->update(['password' => Hash::make($request->new_password)]);
                $request->session()->forget('user_id'); return response()->json(['error'=>false,'message'=>'Changes Saved Successfully']);
            }else{ return response()->json(['error'=>true,'message'=>'Current Password Is Wrong']); }
        }else{ return response()->json(['error'=>true,'message'=>'session expires']); }
    }
    public function Personal(Request $request){
        if (session()->get("user_id")) {
            $Update = DB::table('user')->whereuser_id(session()->get("user_id"))->update([
                'seeking' => $request->seeking,
                'reported_sales' => $request->reported_sales,
                'run_rate_sales' => $request->run_rate_sales,
                'ebitda_margin' => $request->ebitda_margin,
                'industry' => $request->industry,
                'location_id' => $request->location_id,
                'assets_or_collateral' => $request->assets_or_collateral,
                'interested' => $request->interested,
                'title' => $request->title,
                'description' => $request->description,
                'business_overview' => $request->business_overview,
                'product_and_service_overview' => $request->product_and_service_overview,
                'assets_overview' => $request->assets_overview,
                'facilities_overview' => $request->facilities_overview,
                'capitalization_overview' => $request->capitalization_overview,
            ]); return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{ return redirect('/login/user'); }
    }
}
