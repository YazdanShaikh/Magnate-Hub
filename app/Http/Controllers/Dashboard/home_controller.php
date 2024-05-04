<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class home_controller extends Controller
{
    public function index(){
        $Total_Plan = DB::table('plan')->count();
        $Active_Plan = DB::table('plan')->where([['expiry','>=',date('Y-m-d')],['status',0]])->count();
        $Expire_Plan = DB::table('plan')->orWhere([['expiry','<',date('Y-m-d')]])->orWhere([['status',1]])->count();
        if ($Active_Plan != 0) { $Active_Plan_Per = ($Active_Plan / $Total_Plan) * 100; }else{ $Active_Plan_Per = 0; }
        if ($Expire_Plan != 0) { $Expire_Plan_Per = ($Expire_Plan / $Total_Plan) * 100; }else{ $Expire_Plan_Per = 0; }

        $Total_Raising = DB::table('raising')->count();
        $Active_Raising = DB::table('raising')->wherestatus(0)->count();
        $De_Active_Raising = DB::table('raising')->wherestatus(1)->count();

        $Total_User = DB::table('user')->count();
        $Active_User = DB::table('user')->wherestatus(0)->count();
        $De_Active_User = DB::table('user')->wherestatus(1)->count();

        $Get_Plans_Overview = DB::table('plan')->select('date','type')->get();
        // DD($Get_Plans_Overview);
        $Plans_Overview = [];
        $date = null;
        $Essentials = 0;
        $Premium = 0;
        $Enterprise = 0;
        $Capital = 0;
        foreach ($Get_Plans_Overview as $GPO) {
            if ($date == null) {
                $date = $GPO->date;
            }else{
                if ($date != $GPO->date) {
                    $Array = array('Date'=>$date,'Essentials' => $Essentials,'Premium' => $Premium,'Enterprise' => $Enterprise,'Capital' => $Capital);
                    $Plans_Overview[] = $Array;
                    $date = $GPO->date;
                    $Essentials = 0;
                    $Premium = 0;
                    $Enterprise = 0;
                    $Capital = 0;
                }
            }
            if ($GPO->type == 1) { $Essentials += 1; }
            if ($GPO->type == 2) { $Premium += 1; }
            if ($GPO->type == 3) { $Enterprise += 1; }
            if ($GPO->type == 4) { $Capital += 1; }
        }

        if ($date != null) {
            $Array = array('Date'=>$date,'Essentials' => $Essentials,'Premium' => $Premium,'Enterprise' => $Enterprise,'Capital' => $Capital);
            $Plans_Overview[] = $Array;
        }

        $Total_Earning = 0;
        $Essentials_Earning = 0;
        $Premium_Earning = 0;
        $Enterprise_Earning = 0;
        $Capital_Earning = 0;
        $Plans_Earning = DB::table('plan')->select('type')->get();
        foreach($Plans_Earning as $PE){
            if ($PE->type == 1) { $Essentials_Earning += 19; $Total_Earning += 19;}
            if ($PE->type == 2) { $Premium_Earning += 29; $Total_Earning += 29;}
            if ($PE->type == 3) { $Enterprise_Earning += 39; $Total_Earning += 39;}
            if ($PE->type == 4) { $Capital_Earning += 249; $Total_Earning += 249;}
        }

        if ($Essentials_Earning != 0) { $Essentials_Earning_Per = ($Essentials_Earning / $Total_Earning) * 100; }else{ $Essentials_Earning_Per = 0; }
        if ($Premium_Earning != 0) { $Premium_Earning_Per = ($Premium_Earning / $Total_Earning) * 100; }else{ $Premium_Earning_Per = 0; }
        if ($Enterprise_Earning != 0) { $Enterprise_Earning_Per = ($Enterprise_Earning / $Total_Earning) * 100; }else{ $Enterprise_Earning_Per = 0; }
        if ($Capital_Earning != 0) { $Capital_Earning_Per = ($Capital_Earning / $Total_Earning) * 100; }else{ $Capital_Earning_Per = 0; }

        $Total_Project = DB::table('project')->count();
        $Normal_Project = DB::table('project')->where([['premium',0]])->count();
        $Premium_Project = DB::table('project')->where([['premium',1]])->count();
        $Active_Project = DB::table('project')->where([['status',0]])->count();
        $De_Active_Project = DB::table('project')->where([['status',1]])->count();
        $Block_Project = DB::table('project')->where([['block',1]])->count();

        if ($Normal_Project != 0) { $Normal_Project_Per = ($Normal_Project / $Total_Project) * 100; }else{ $Normal_Project_Per = 0; }
        if ($Premium_Project != 0) { $Premium_Project_Per = ($Premium_Project / $Total_Project) * 100; }else{ $Premium_Project_Per = 0; }
        if ($Active_Project != 0) { $Active_Project_Per = ($Active_Project / $Total_Project) * 100; }else{ $Active_Project_Per = 0; }
        if ($De_Active_Project != 0) { $De_Active_Project_Per = ($De_Active_Project / $Total_Project) * 100; }else{ $De_Active_Project_Per = 0; }
        if ($Block_Project != 0) { $Block_Project_Per = ($Block_Project / $Total_Project) * 100; }else{ $Block_Project_Per = 0; }

        $Contact = DB::table('contact')->select('name','email','subject','phone','date')->orderby('contact_id','DESC')->TAKE(10)->GET();

        $Traffic = DB::table('traffic')->select('date',DB::raw('COUNT(*) as count'))->groupby('date')->where([['month',date('m')],['year',date('Y')]])->get();

        return view('dashboard.home.index',['Total_Plan' => $Total_Plan,'Active_Plan' => $Active_Plan,'Expire_Plan' => $Expire_Plan,'Active_Plan_Per' => $Active_Plan_Per,'Expire_Plan_Per' => $Expire_Plan_Per,'Total_Raising' => $Total_Raising,'Active_Raising' => $Active_Raising,'De_Active_Raising' => $De_Active_Raising,'Total_User' => $Total_User,'Active_User' => $Active_User,'De_Active_User' => $De_Active_User,'Plans_Overview' => $Plans_Overview,'Essentials_Earning' => $Essentials_Earning,'Premium_Earning' => $Premium_Earning,'Enterprise_Earning' => $Enterprise_Earning,'Capital_Earning' => $Capital_Earning,'Essentials_Earning_Per' => $Essentials_Earning_Per,'Premium_Earning_Per' => $Premium_Earning_Per,'Enterprise_Earning_Per' => $Enterprise_Earning_Per,'Capital_Earning_Per' => $Capital_Earning_Per,'Total_Earning' => $Total_Earning,'Total_Project' => $Total_Project,'Normal_Project' => $Normal_Project,'Premium_Project' => $Premium_Project,'Active_Project' => $Active_Project,'De_Active_Project' => $De_Active_Project,'Block_Project' => $Block_Project,'Normal_Project_Per' => $Normal_Project_Per,'Premium_Project_Per' => $Premium_Project_Per,'Active_Project_Per' => $Active_Project_Per,'De_Active_Project_Per' => $De_Active_Project_Per,'Block_Project_Per' => $Block_Project_Per,'Contact' => $Contact,'Traffic' => $Traffic]);
    }
}
