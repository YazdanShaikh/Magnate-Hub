<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class plan_controller extends Controller
{
    public function index(){return view('raising.plan.index');}
    public function Get(){
        if (session()->get("raising_id")) {
            $Plan = DB::table('plan')->select('type','expiry','date','code','status')->whereraising_id(session()->get("raising_id"))->orderby('plan_id','DESC')->GET();
            return view("raising.include.plan.index",['Plan' => $Plan]);
        }else{ return response()->json(['error' => true]); }
    }
}
