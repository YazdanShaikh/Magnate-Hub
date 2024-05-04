<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class contact_controller extends Controller
{
    public function index(){
        return view('dashboard.contact.index');
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['contact.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['contact.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['contact.date','<=',$request->end_date];}
            $contact = DB::table('contact')->select('contact.name','contact.email','contact.phone','contact.subject','contact.code','contact.date','contact.message')->where($Where)->orderby('contact.contact_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.contact.index',['contact'=>$contact]);
        }else{return response()->json(['error' => true]);}
    }
    public function Read(Request $request){
        if (session()->get("account_id")) {
            $contact = DB::table('contact')->wherecode($request->code)->get();
            return response()->json(['contact' => $contact]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $contact = DB::table('contact')->wherecode($request->code)->delete();
            return response()->json(['error' => false,'message'=>'Contact Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
}
