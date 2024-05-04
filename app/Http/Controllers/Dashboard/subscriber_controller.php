<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class subscriber_controller extends Controller
{
    public function index(){
        return view('dashboard.subscriber.index');
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['subscriber.email','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['subscriber.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['subscriber.date','<=',$request->end_date];}
            $subscriber = DB::table('subscriber')->select('subscriber.email','subscriber.code','subscriber.date')->where($Where)->orderby('subscriber.subscriber_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.subscriber.index',['subscriber'=>$subscriber]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $subscriber = DB::table('subscriber')->wherecode($request->code)->delete();
            return response()->json(['error' => false,'message'=>'Subscriber Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
}
