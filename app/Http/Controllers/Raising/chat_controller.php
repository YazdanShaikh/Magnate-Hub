<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class chat_controller extends Controller
{
    public function index(){if (session()->get("raising_id")) {return view('raising.chat.index',['project_id' => 0,'user_id' => 0]);}else{return redirect('/dashboard/professionals/');}}
    public function Insert(Request $request){
        if (session()->get("raising_id")) {
            $Project = DB::table('project')->select('project_id')->whereproject_id($request->project_id)->get();
            $insert = DB::table('chat')->insert(
                [
                    'raising_id' => session()->get("raising_id"),
                    'user_id' => $request->user_id,
                    'project_id' => $request->project_id,
                    'message' => $request->message,
                    'send' => 1,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $chat_id = DB::getPdo()->lastInsertId(); $code = md5($chat_id);
            $update = DB::table('chat')->wherechat_id($chat_id)->update(['code' => $code]);
            return response()->json(['error' => false,'message'=>'Message Send Successfully']);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function List(Request $request){
        if (session()->get("raising_id")) {
            $List = DB::table('chat')->leftjoin('user','user.user_id','=','chat.user_id')->leftjoin('project','project.project_id','=','chat.project_id')->select('chat.project_id','user.name','project.name as project','chat.user_id','user.profile')->where('chat.raising_id',session()->get("raising_id"))->groupby('chat.project_id','user.name','project.name','chat.user_id','user.profile')->orderby('chat.date','DESC')->get();
            $Notification = DB::table('chat')->select('project_id',DB::raw('count(*) as count'))->where([['raising_id',session()->get("raising_id")],['chat.status',0],['send',0]])->groupby('project_id')->get();
            return view("raising.include.chat.list",['List' => $List,'Notification' => $Notification]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Get(Request $request){
        if (session()->get("raising_id")) {
            $Chat = DB::table('chat')->leftjoin('user','user.user_id','=','chat.user_id')->leftjoin('raising','raising.raising_id','=','chat.raising_id')->select('chat.*','user.profile as user_profile','raising.profile as raising_profile')->where([['chat.project_id',$request->project_id],['chat.user_id',$request->user_id]])->get();
            $User = DB::table('user')->select('user.name','user.profile','user.code')->where([['user_id',$request->user_id]])->get();
            $Project = DB::table('project')->select('project.card','project.name')->where([['project_id',$request->project_id]])->get();
            $Notification = DB::table('chat')->where([['project_id',$request->project_id],['user_id',$request->user_id],['send',0]])->update(['status' => 1]);
            return view("raising.include.chat.view",['Chat' => $Chat,'User' => $User,'Project' => $Project]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Check(Request $request){
        if (session()->get("raising_id")) {
            $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('raising','raising.raising_id','=','chat.raising_id')->select('chat.*','project.card','raising.name')->where([['chat.project_id',$request->project_id],['chat.user_id',$request->user_id]])->count();
            return response()->json(['error' => false,'Chat' => $Chat]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function UnRead(Request $request){
        if (session()->get("raising_id")) {
            $Chat = DB::table('chat')->leftjoin('user','user.user_id','=','chat.user_id')->leftjoin('raising','raising.raising_id','=','chat.raising_id')->select('chat.*','user.profile as user_profile','raising.profile as raising_profile')->where([['chat.project_id',$request->project_id],['chat.user_id',$request->user_id]])->orderby('chat.chat_id','DESC')->take($request->take)->get();
            return view("raising.include.chat.new",['Chat' => $Chat]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Notification(){
        $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('user','user.user_id','=','chat.user_id')->select('chat.message','project.name as project_name','user.name as user_name','chat.time','chat.date','chat.code','user.profile')->where([['chat.raising_id',session()->get("raising_id")],['chat.status',0],['chat.send',0]])->orderby('chat.chat_id','DESC')->get();
        return view("raising.include.chat.notification",['Chat' => $Chat]);
    }
    public function Redirect_On_Chat($code){
        if (session()->get("raising_id")) {
            $Chat = DB::table('chat')->select('user_id','project_id')->wherecode($code)->get();
            $Notification = DB::table('chat')->where([['project_id',$Chat[0]->project_id],['user_id',$Chat[0]->user_id],['send',0]])->update(['status' => 1]);
            return view('raising.chat.index',['project_id' => $Chat[0]->project_id,'user_id' => $Chat[0]->user_id]);
        }else{return redirect('/dashboard/professionals/');}
    }

    public function user_profile($code){
        if (session()->get("raising_id")) {
            $User = DB::table('user')->leftjoin('location','location.location_id','=','user.location_id')->select('user.*','location.name as location')->where('user.code','=',$code)->get();
            return view('raising.user.index',['User' => $User]);
        }else{return redirect('/dashboard/professionals/');}
    }
}
