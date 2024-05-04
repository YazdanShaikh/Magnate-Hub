<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class common_controller extends Controller
{
    public function Get_Category(){
        $category = DB::table('category')->select('name','category_id','url','card')->wherestatus(0)->get();
        return response()->json(['error' => false,'category'=>$category]);
    }
    public function Get_Location(){
        $location = DB::table('location')->select('name','location_id','url')->wherestatus(0)->get();
        return response()->json(['error' => false,'location'=>$location]);
    }
}
