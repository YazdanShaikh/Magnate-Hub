<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Stevebauman\Location\Facades\Location;

class home_controller extends Controller
{
    public function index(){
        $Select = ['project.name','location.name as location','project.url','project.card'];
        $Premium = DB::table('project')->leftjoin('location','location.location_id','=','project.location_id')->leftjoin('plan','plan.raising_id','=','project.raising_id')->select($Select)->where([['project.status',0],['plan.expiry','>=',date('Y-m-d')],['plan.status','=',0],['project.sold',0],['project.block',0]])->orderby('project.views','DESC')->take(20)->get();
        $Location = DB::table('location')->select('name','location_id')->where('status',0)->orderby('location_id','DESC')->get();
        $Location_Project = [];
        foreach ($Location as $l) {
            $Get_Location_Project = DB::table('project')->leftjoin('category','category.category_id','=','project.category_id')->leftjoin('plan','plan.raising_id','=','project.raising_id')->select('project.name','project.url','project.card','category.name as category','project.location_id')->where([['project.status',0],['project.sold',0],['project.block',0],['project.premium',1],['plan.expiry','>=',date('Y-m-d')],['plan.type','=',4]])->orderby('project.views','DESC')->take(20)->get(); foreach($Get_Location_Project as $GLP){$Location_Project[] = $GLP;}
        }
        return view('website.home.index',['Premium' => $Premium,'Location' => $Location,'Location_Project' => $Location_Project]);
    }
}
