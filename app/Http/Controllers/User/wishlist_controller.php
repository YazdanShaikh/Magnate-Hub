<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class wishlist_controller extends Controller
{
    public function index(){return view('user.wishlist.index');}
    public function Get(Request $request){
        if (session()->get("user_id")) {
            $Where = [['wishlist.user_id',session()->get("user_id")]];
            if ($request->search != null) {$Where[] = ['wishlist.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['wishlist.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['wishlist.date','<=',$request->end_date];}
            $wishlist = DB::table('wishlist')->leftjoin('project','project.project_id','=','wishlist.project_id')->select('project.name','wishlist.date','wishlist.code','project.card')->where($Where)->orderby('wishlist.wishlist_id',$request->orderby)->take($request->take)->get(); return view('user.include.wishlist.index',['wishlist'=>$wishlist]);
        }else{return response()->json(['error' => true]);}
    }
    public function Remove(Request $request){
        if (session()->get("user_id")) {
           $Remove = DB::table('wishlist')->wherecode($request->code)->delete();
           return response()->json(['error' => false]);
        }else{return response()->json(['error' => true]);}
    }
}
