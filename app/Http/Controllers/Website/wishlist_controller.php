<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class wishlist_controller extends Controller
{
    public function index(){
    if (session()->get("user_id")) {
        return view('website.wishlist.index');
    }else{ return redirect('/login'); }}

    public function Insert(Request $request){
        if (session()->get("user_id")) {
            $project = DB::table('project')->select('project_id')->whereurl($request->url)->get();
            $Count = DB::table('wishlist')->where([['user_id',session()->get("user_id")],['project_id',$project[0]->project_id]])->count();
            if ($Count != 0) {
                $Delete = DB::table('wishlist')->where([['user_id',session()->get("user_id")],['project_id',$project[0]->project_id]])->delete();
                return response()->json(['error' => false,'message'=>'Wishlist Removed Successfully','wishlist'=>0]);
            }else{
                $Insert = DB::table('wishlist')->insert(['project_id' => $project[0]->project_id,'user_id' => session()->get("user_id"),'date' => date('Y-m-d'),'time' => date('H:i:s')]);
                $wishlist_id = DB::getPdo()->lastInsertId(); $update = DB::table('wishlist')->wherewishlist_id($wishlist_id)->update(['code' => md5($wishlist_id)]); return response()->json(['error' => false,'message'=>'Wishlist Saved Successfully','wishlist'=>1]);
            }
        }else{ return response()->json(['error' => true]);}
    }
    public function Get(){
        if (session()->get("user_id")) {
            $Conditions = [['project.status',0],['wishlist.user_id',session()->get("user_id")]];
            $Select = ['project.name','project.url','project.card','category.name as category','project.rating','project.price','project.best','project.discount','project.project_id'];
            $project = DB::table('project')->leftjoin('category','category.category_id','=','project.category_id')->leftjoin('wishlist','wishlist.project_id','=','project.project_id')->select($Select)->where($Conditions)->orderby('project.project_id','DESC')->get();
            $wishlist = DB::table('wishlist')->select('project_id')->where('user_id',session()->get("user_id"))->get();
            return view("website.include.project.index",['project'=>$project,'wishlist' => $wishlist]);
        }else{ return response()->json(['error' => true]);  }
    }
}
