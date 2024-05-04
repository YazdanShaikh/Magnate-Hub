<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class contact_controller extends Controller
{
    public function index(){
        return view('website.contact.index');
    }

    public function Insert(Request $request){
        $Insert = DB::table('contact')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s')
            ]);
        $contact_id = DB::getPdo()->lastInsertId();
        $Update = DB::table('contact')->wherecontact_id($contact_id)->update(['code' => md5($contact_id)]);
    }
}
