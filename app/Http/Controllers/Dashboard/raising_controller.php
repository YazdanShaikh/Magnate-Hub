<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class raising_controller extends Controller
{
    public function index(){
        return view('dashboard.raising.index');
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [['raising.delete',0]];
            if ($request->search != null) {$Where[] = ['raising.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['raising.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['raising.date','<=',$request->end_date];}
            $raising = DB::table('raising')->select('raising.first_name','raising.last_name','raising.email','raising.phone','raising.status','raising.code','raising.date','raising.profile')->where($Where)->orderby('raising.raising_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.raising.index',['raising'=>$raising]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $raising = DB::table('raising')->wherecode($request->code)->update(['delete' => 1,'status' => 1]);
            return response()->json(['error' => false,'message'=>'Raiser Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("raising")->select('status')->where('code','=',$request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_raising = DB::table('raising')->where('code', '=', $request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' Raiser Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_raising = DB::table('raising')->where('code', '=', $request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'Raiser Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
    public function Info($code){
        if (session()->get("account_id")) {
            $Raising = DB::table('raising')->select('first_name','last_name','email','phone','earning','net_worth','passport','identification','tin','nationality','gender','status','date','profile','raising_id')->wherecode($code)->get();
            $plan = DB::table('plan')->where([['raising_id',$Raising[0]->raising_id],['expiry','>=',date('Y-m-d')],['status',0]])->get();
            $plans = DB::table('plan')->where([['raising_id',$Raising[0]->raising_id]])->get();
            $project = DB::table('project')->select('project.name','project.status','project.code','project.date','project.card','project.views','project.premium','project.block')->where('project.raising_id',$Raising[0]->raising_id)->orderby('project.project_id','DESC')->get();

            $Total = DB::table('project')->where([['raising_id',$Raising[0]->raising_id]])->count();
            $Normal = DB::table('project')->where([['raising_id',$Raising[0]->raising_id],['premium',0]])->count();
            $Premium = DB::table('project')->where([['raising_id',$Raising[0]->raising_id],['premium',1]])->count();
            $Active = DB::table('project')->where([['raising_id',$Raising[0]->raising_id],['status',0]])->count();
            $De_Active = DB::table('project')->where([['raising_id',$Raising[0]->raising_id],['status',1]])->count();
            $Block = DB::table('project')->where([['raising_id',$Raising[0]->raising_id],['block',1]])->count();

            if ($Normal != 0) { $Normal_Per = ($Normal / $Total) * 100; }else{ $Normal_Per = 0; }
            if ($Premium != 0) { $Premium_Per = ($Premium / $Total) * 100; }else{ $Premium_Per = 0; }
            if ($Active != 0) { $Active_Per = ($Active / $Total) * 100; }else{ $Active_Per = 0; }
            if ($De_Active != 0) { $De_Active_Per = ($De_Active / $Total) * 100; }else{ $De_Active_Per = 0; }
            if ($Block != 0) { $Block_Per = ($Block / $Total) * 100; }else{ $Block_Per = 0; }

            return view("dashboard.raising.info",['Raising' => $Raising,'plan' => $plan,'plans' => $plans,'project' => $project,'Total' => $Total,'Normal' => $Normal,'Premium' => $Premium,'Active' => $Active,'De_Active' => $De_Active,'Block' => $Block,'Normal_Per' => $Normal_Per,'Premium_Per' => $Premium_Per,'Active_Per' => $Active_Per,'De_Active_Per' => $De_Active_Per,'Block_Per' => $Block_Per]);
        }else{return response()->json(['error' => true]);}
    }
}
