<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class blog_controller extends Controller
{
    public function index(){return view('website.blog.index');}
    public function GET(Request $request){
        $Where = [['status',0]]; if ($request->last_id != 0) {$Where[] = ['blog_id','<',$request->last_id];}
        $Blog = DB::table('blog')->select('name','card','writter_name','writter_image','url','blog_id','description','date','views')->where($Where)->orderby('blog_id','DESC')->take(10)->get(); return view("website.include.blog.index",['Blog'=>$Blog]);
    }
    public function Detail($url){
        if (DB::table('blog')->where([['status',0],['url',$url]])->count() == 0) { return redirect('/404'); }
        return view("website.blog.detail",['url'=>$url]);
    }
    public function Get_Popular(){
        $Blog = DB::table('blog')->select('name','card','date')->wherestatus(0)->orderby('views','DESC')->take(5)->GET();
        return response()->json(['error' => false,'Blog'=>$Blog]);
    }
    public function Get_Detail($url){
        $Blog = DB::table('blog')->where([['status',0],['url',$url]])->get();
        $Increment = DB::table('blog')->where([['status',0],['url',$url]])->increment('views');
        return view("website.include.blog.detail",['Blog'=>$Blog]);
    }
    public function Search(Request $request){
        $Blog = DB::table('blog')->select('name','card','date')->where([['status',0],['name','LIKE','%'.$request->search.'%']])->orderby('views','DESC')->take(5)->GET(); return response()->json(['error' => false,'Blog'=>$Blog]);
    }
    public function Insert(Request $request){
        if (session()->get("user_id")) {
            $Blog = DB::table('blog')->select('blog_id')->whereurl($request->url)->get();
            $Insert = DB::table('comment')->insert(['name' => $request->name,'email' => $request->email,'phone' => $request->phone,'message' => $request->message,'blog_id' => $Blog[0]->blog_id,'user_id' => session()->get("user_id"),'date' => date('Y-m-d'),'time' => date('H:i:s')]);
            $comment_id = DB::getPdo()->lastInsertId(); $Update = DB::table('comment')->wherecomment_id($comment_id)->update(['code' => md5($comment_id)]);
            return response()->json(['error' => false,'message'=>'Comment Posted Successfully']);
        }
    }
}
