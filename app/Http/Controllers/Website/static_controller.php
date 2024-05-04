<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class static_controller extends Controller
{
    public function about(){return view('website.static.about');}
    public function investor(){return view('website.static.investor');}
    public function pricing(){return view('website.static.pricing');}
}
