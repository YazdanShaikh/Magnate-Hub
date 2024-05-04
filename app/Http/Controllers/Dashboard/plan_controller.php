<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class plan_controller extends Controller
{
    public function index(){
        return view('dashboard.plan.index');
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['plan.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['plan.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['plan.date','<=',$request->end_date];}
            $plan = DB::table('plan')->leftjoin('raising','raising.raising_id','=','plan.raising_id')->select('plan.type','plan.expiry','plan.date','plan.status','plan.code','raising.first_name','raising.last_name')->where($Where)->orderby('plan.plan_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.plan.index',['plan'=>$plan]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $plan = DB::table('plan')->wherecode($request->code)->update(['delete' => 1,'status' => 1]);
            return response()->json(['error' => false,'message'=>'Plan Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("plan")->select('status')->where('code','=',$request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_plan = DB::table('plan')->where('code', '=', $request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' Plan Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_plan = DB::table('plan')->where('code', '=', $request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'Plan Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
}
