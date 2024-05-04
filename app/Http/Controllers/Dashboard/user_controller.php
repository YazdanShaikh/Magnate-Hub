<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class user_controller extends Controller
{
    public function index(){
        return view('dashboard.user.index');
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [['user.delete',0]];
            if ($request->search != null) {$Where[] = ['user.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['user.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['user.date','<=',$request->end_date];}
            $user = DB::table('user')->select('user.name','user.email','user.phone','user.status','user.code','user.date','user.profile')->where($Where)->orderby('user.user_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.user.index',['user'=>$user]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $user = DB::table('user')->wherecode($request->code)->update(['delete' => 1,'status' => 1]);
            return response()->json(['error' => false,'message'=>'User Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("user")->select('status')->where('code','=',$request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_user = DB::table('user')->where('code', '=', $request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' User Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_user = DB::table('user')->where('code', '=', $request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'User Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
}
