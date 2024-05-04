<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class dashboard_controller extends Controller
{
    public function index(){
    if (session()->get("raising_id")) {
        $Total = DB::table('project')->where([['raising_id',session()->get("raising_id")]])->count();
        $Normal = DB::table('project')->where([['raising_id',session()->get("raising_id")],['premium',0]])->count();
        $Premium = DB::table('project')->where([['raising_id',session()->get("raising_id")],['premium',1]])->count();
        $Active = DB::table('project')->where([['raising_id',session()->get("raising_id")],['status',0]])->count();
        $De_Active = DB::table('project')->where([['raising_id',session()->get("raising_id")],['status',1]])->count();
        $Block = DB::table('project')->where([['raising_id',session()->get("raising_id")],['block',1]])->count();
        $Top_Projects = DB::table('project')->select('views','name')->where([['raising_id',session()->get("raising_id")]])->orderby('views','DESC')->take(15)->GET();
        return view('raising.home.index',['Total' => $Total,'Normal' => $Normal,'Premium' => $Premium,'Active' => $Active,'De_Active' => $De_Active,'Block' => $Block,'Top_Projects' => $Top_Projects]);
    }else{ return redirect('/login/professionals/'); }}
}
