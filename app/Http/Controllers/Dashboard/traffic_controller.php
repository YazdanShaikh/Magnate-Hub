<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class traffic_controller extends Controller
{
    public function index_date(){return view('dashboard.traffic.date',['date' => date('Y-m-d')]);}
    public function Date(Request $request){
    $Traffic = DB::table('traffic')->select('country','city',DB::raw('COUNT(*) as count'))->groupby('country','city')->where('date',$request->date)->get();
    return view("dashboard.include.traffic.date",['Traffic' => $Traffic]); }
    public function Redirect_date($date){return view('dashboard.traffic.date',['date' => $date]);}

    public function index_day(){
    $Months = DB::table('traffic')->select('month')->distinct('month')->get();
    $Years = DB::table('traffic')->select('year')->distinct('year')->get();
    return view('dashboard.traffic.day',['Months' => $Months,'Years' => $Years,'Month' => date('m'),'Year' => date('Y')]);}
    public function Day(Request $request){
    $Traffic = DB::table('traffic')->select('date',DB::raw('COUNT(*) as count'))->groupby('date')->where([['month',$request->month],['year',$request->year]])->get();
    return view("dashboard.include.traffic.day",['Traffic' => $Traffic]);}
    public function Redirect_day($Month, $Year){
    $Months = DB::table('traffic')->select('month')->distinct('month')->get();
    $Years = DB::table('traffic')->select('year')->distinct('year')->get();
    return view('dashboard.traffic.day',['Months' => $Months,'Years' => $Years,'Month' => $Month,'Year' => $Year]);}


    public function index_month(){
    $Years = DB::table('traffic')->select('year')->distinct('year')->get();
    return view('dashboard.traffic.month',['Years' => $Years,'Year' => date('Y')]);}
    public function Month(Request $request){
    $Traffic = DB::table('traffic')->select('month','year',DB::raw('COUNT(*) as count'))->groupby('month','year')->where([['year',$request->year]])->get();
    return view("dashboard.include.traffic.month",['Traffic' => $Traffic]);}
    public function Redirect_month($Year){
    $Years = DB::table('traffic')->select('year')->distinct('year')->get();
    return view('dashboard.traffic.month',['Years' => $Years,'Year' => $Year]);}

    public function index_year(){
    $Year = DB::table('traffic')->select('year')->distinct('year')->get();
    return view('dashboard.traffic.year',['Year' => $Year]);}
    public function Year(Request $request){
    $Traffic = DB::table('traffic')->select('year',DB::raw('COUNT(*) as count'))->groupby('year')->get();
    return view("dashboard.include.traffic.year",['Traffic' => $Traffic]); }

    public function index_country(){return view("dashboard.traffic.country");}
    public function Country(Request $request){
    $Traffic = DB::table('traffic')->select('country',DB::raw('COUNT(*) as count'))->groupby('country')->get();
    return view("dashboard.include.traffic.country",['Traffic' => $Traffic]); }

    public function index_city(){
    $Countries = DB::table('traffic')->select('country')->distinct('country')->get();
    return view("dashboard.traffic.city",['Countries' => $Countries,'Country' => '']);}

    public function Redirect_city($Country){
    $Countries = DB::table('traffic')->select('country')->distinct('country')->get();
    return view("dashboard.traffic.city",['Countries' => $Countries,'Country' => $Country]);}

    public function City(Request $request){
    $Traffic = DB::table('traffic')->select('city','country',DB::raw('COUNT(*) as count'))->groupby('city','country')->where('country',$request->country)->get();
    return view("dashboard.include.traffic.city",['Traffic' => $Traffic]); }


    public function index_city_and_country($City, $Country){
    $Countries = DB::table('traffic')->select('country')->distinct('country')->get();
    $Cities = DB::table('traffic')->select('city')->distinct('city')->get();
    return view("dashboard.traffic.city_and_country",['Countries' => $Countries,'Country' => $Country,'Cities' => $Cities,'City' => $City]);}

    public function Get_City($Country){
    $Cities = DB::table('traffic')->select('city')->distinct('city')->where('country',$Country)->get();
    return response()->json(['Cities' => $Cities]);}

    public function City_And_Country(Request $request){
    $Traffic = DB::table('traffic')->select('date',DB::raw('COUNT(*) as count'))->groupby('date')->where([['country',$request->country],['city',$request->city]])->get();
    return view("dashboard.include.traffic.city_and_country",['Traffic' => $Traffic]); }
}
