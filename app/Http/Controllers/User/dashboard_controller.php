<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class dashboard_controller extends Controller
{
    public function index(){if (session()->get("user_id")) {
        $Bookmark = DB::table('wishlist')->whereuser_id(session()->get("user_id"))->count();
        return view('user.home.index',['Bookmark' => $Bookmark]);
    }else{return redirect('/login');}}
}
