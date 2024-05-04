<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class chat_controller extends Controller
{
    public function index(){if (session()->get("user_id")) {return view('user.chat.index',['project_id' => 0]);}else{return redirect('/dashboard/user');}}
    public function Insert(Request $request){
        if (session()->get("user_id")) {
            $Project = DB::table('project')->select('raising_id')->whereproject_id($request->project_id)->get();
            $insert = DB::table('chat')->insert(
                [
                    'user_id' => session()->get("user_id"),
                    'raising_id' => $Project[0]->raising_id,
                    'project_id' => $request->project_id,
                    'message' => $request->message,
                    'send' => 0,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $chat_id = DB::getPdo()->lastInsertId(); $code = md5($chat_id);
            $update = DB::table('chat')->wherechat_id($chat_id)->update(['code' => $code]);
            return response()->json(['error' => false,'message'=>'Message Send Successfully']);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function List(Request $request){
        if (session()->get("user_id")) {
            $List = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('raising','raising.raising_id','=','project.raising_id')->select('chat.project_id','project.name as project','raising.first_name','raising.last_name','project.card','project.project_id')->where('chat.user_id',session()->get("user_id"))->groupby('chat.project_id','project.name','raising.first_name','raising.last_name','project.card','project.project_id')->orderby('chat.date','DESC')->get();
            $Notification = DB::table('chat')->select('project_id',DB::raw('count(*) as count'))->where([['user_id',session()->get("user_id")],['chat.status',0],['send',1]])->groupby('project_id')->get();
            return view("user.include.chat.list",['List' => $List,'Notification' => $Notification]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Get(Request $request){
        if (session()->get("user_id")) {
            $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('user','user.user_id','=','chat.user_id')->select('chat.*','project.card','user.name','user.profile')->where([['chat.project_id',$request->project_id],['chat.user_id',session()->get("user_id")]])->get();
            $Project = DB::table('project')->leftjoin('raising','raising.raising_id','=','project.raising_id')->select('project.name','raising.first_name','raising.last_name','project.card','raising.code')->where([['project.project_id',$request->project_id]])->get();
            $Notification = DB::table('chat')->where([['project_id',$request->project_id],['user_id',session()->get("user_id")],['send',1]])->update(['status' => 1]);
            return view("user.include.chat.view",['Chat' => $Chat,'Project' => $Project]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Check(Request $request){
        if (session()->get("user_id")) {
            $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('user','user.user_id','=','chat.user_id')->select('chat.*','project.card','user.name')->where([['chat.project_id',$request->project_id],['chat.user_id',session()->get("user_id")]])->count();
            return response()->json(['error' => false,'Chat' => $Chat]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function UnRead(Request $request){
        if (session()->get("user_id")) {
            $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('user','user.user_id','=','chat.user_id')->select('chat.*','project.card','user.name','user.profile')->where([['chat.project_id',$request->project_id],['chat.user_id',session()->get("user_id")]])->orderby('chat.chat_id','DESC')->take($request->take)->get();
            return view("user.include.chat.new",['Chat' => $Chat]);
        }else{ return response()->json(['error' => true,'message'=>'Session Expire!']); }
    }
    public function Notification(){
        $Chat = DB::table('chat')->leftjoin('project','project.project_id','=','chat.project_id')->leftjoin('raising','raising.raising_id','=','chat.raising_id')->select('chat.message','project.card','project.name as project_name','chat.time','chat.date','chat.code','raising.first_name','raising.last_name')->where([['chat.user_id',session()->get("user_id")],['chat.status',0],['chat.send',1]])->orderby('chat.chat_id','DESC')->get();
        return view("user.include.chat.notification",['Chat' => $Chat]);
    }
    public function Redirect_On_Chat($code){
        if (session()->get("user_id")) {
            $Chat = DB::table('chat')->select('project_id')->wherecode($code)->get();
            $Notification = DB::table('chat')->where([['project_id',$Chat[0]->project_id],['user_id',session()->get("user_id")],['send',1]])->update(['status' => 1]);
            return view('user.chat.index',['project_id' => $Chat[0]->project_id]);
        }else{return redirect('/dashboard/user');}
    }
    public function raising_profile($code){
        if (session()->get("user_id")) {
            $Raising = DB::table('raising')->where('raising.code','=',$code)->get();
            return view('user.raising.index',['Raising' => $Raising]);
        }else{return redirect('/dashboard/user/');}
    }
}
