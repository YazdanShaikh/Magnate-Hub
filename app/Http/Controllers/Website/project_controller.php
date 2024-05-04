<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class project_controller extends Controller
{
    public function index(){return view('website.project.index',['category_id'=>0,'location_id'=>0,'keywords'=>0,'premium'=>0,'type' => 0]);}
    public function Filter(Request $request){
        $Conditions = [['project.status',0],['project.sold',0],['project.block',0]];
        $Order_Column = 'project.project_id';
        $Order_By = 'DESC';
        if ($request->name != 0){ $Conditions[] = ['project.name','LIKE','%'.$request->name.'%']; }
        if ($request->id != 0){ $Conditions[] = ['project.id','=',$request->id]; }
        if ($request->category_id != 0){ $Conditions[] = ['project.category_id',$request->category_id]; }
        if ($request->location_id != 0){ $Conditions[] = ['project.location_id',$request->location_id]; }
        if ($request->type != 0){ $Conditions[] = ['project.type',$request->type]; }
        if ($request->min != 500){ $Conditions[] = ['project.price','>=',$request->min]; }
        if ($request->max != 50000){ $Conditions[] = ['project.price','<=',$request->max]; }
        if ($request->franchise != 0){ $Conditions[] = ['project.franchise','=',1]; }
        if ($request->order_by != 0) { $Order_By = $request->order_by;}
        if ($request->views != 0) { $Order_Column = 'project.views';}

        $Select = ['project.name','category.name as category','location.name as location','project.description','project.rating','project.url','project.card','project.premium','franchise','project.id'];

        $Project = [];

        $Premium = DB::table('project')->leftjoin('category','category.category_id','=','project.category_id')->leftjoin('location','location.location_id','=','project.location_id')->leftjoin('plan','plan.raising_id','=','project.raising_id')->select($Select)->where($Conditions)->where([['project.premium',1],['plan.status',0]])->orderby($Order_Column,$Order_By)->take($request->limit)->get();
        foreach($Premium->shuffle() as $p){ $Project[] = $p; }

        $Count = count($Premium);
        $find = $request->limit - $Count;
        if($find > 0){
            $limit = $find;
        }else{
            $limit = 0;
        }
        if($request->premium == 0){
            $Normal = DB::table('project')->leftjoin('category','category.category_id','=','project.category_id')->leftjoin('location','location.location_id','=','project.location_id')->leftjoin('plan','plan.raising_id','=','project.raising_id')->select($Select)->where($Conditions)->where([['project.premium',0],['plan.status',0]])->orderby($Order_Column,$Order_By)->take($limit)->get();
            foreach($Normal as $n){ $Project[] = $n; }
        }

        return view("website.include.project.index",['Project'=>$Project]);
    }
    public function Category_Redirect($url,$type){
        $category = DB::table('category')->select('category_id')->whereurl($url)->get();
        return view('website.project.index',['category_id'=>$category[0]->category_id,'location_id'=>0,'keywords'=>0,'premium'=>0,'type' => $type]);
    }
    public function Location_Redirect($url,$type){
        $location = DB::table('location')->select('location_id')->whereurl($url)->get();
        return view('website.project.index',['category_id'=>0,'location_id'=>$location[0]->location_id,'keywords'=>0,'premium'=>0,'type' => $type]);
    }
    public function Keywords_Redirect($keywords,$type){
        return view('website.project.index',['category_id'=>0,'location_id'=>0,'keywords'=>$keywords,'premium'=>0,'type' => $type]);
    }
    public function Category_And_Location_Redirect($CAT_URL,$LOC_URL,$type){
        $category = DB::table('category')->select('category_id')->whereurl($CAT_URL)->get();
        $location = DB::table('location')->select('location_id')->whereurl($LOC_URL)->get();
        return view('website.project.index',['category_id'=>$category[0]->category_id,'location_id'=>$location[0]->location_id,'keywords'=>0,'premium'=>0,'type' => $type]);
    }
    public function Location_And_Keywords_Redirect($LOC_URL,$keywords,$type){
        $location = DB::table('location')->select('location_id')->whereurl($LOC_URL)->get();
        return view('website.project.index',['category_id'=>0,'location_id'=>$location[0]->location_id,'keywords'=>$keywords,'premium'=>0,'type' => $type]);
    }
    public function Category_And_Keywords_Redirect($CAT_URL,$keywords,$type){
        $category = DB::table('category')->select('category_id')->whereurl($CAT_URL)->get();
        return view('website.project.index',['category_id'=>$category[0]->category_id,'location_id'=>0,'keywords'=>$keywords,'premium'=>0,'type' => $type]);
    }
    public function Category_And_Location_Keywords_Redirect($CAT_URL,$LOC_URL,$keywords,$type){
        $category = DB::table('category')->select('category_id')->whereurl($CAT_URL)->get();
        $location = DB::table('location')->select('location_id')->whereurl($LOC_URL)->get();
        return view('website.project.index',['category_id'=>$category[0]->category_id,'location_id'=>$location[0]->location_id,'keywords'=>$keywords,'premium'=>0,'type' => $type]);
    }
    public function Detail($url){
    $Project = DB::table('project')->leftjoin('raising','raising.raising_id','=','project.raising_id')->leftjoin('location','location.location_id','=','project.location_id')->leftjoin('category','category.category_id','=','project.category_id')->leftjoin('plan','plan.raising_id','=','project.raising_id')->select('project.*','project.name','project.price','location.name as location','category.name as category','project.trading','project.earning_type','project.stock_level','project.summary','project.location_information','project.images','project.code','project.category_id','project.project_id','project.raising_id','project.card','raising.first_name','raising.last_name','raising.code as raising_code')->where([['project.status',0],['project.url',$url]])->get();
    $Similar = DB::table('project')->select('project.name','project.url','project.card','project.date')->leftjoin('plan','plan.raising_id','=','project.raising_id')->where([['project.status',0],['project.url','!=',$url],['plan.status',0],['category_id',$Project[0]->category_id],['project.sold',0],['project.block',0]])->get();
    $Wishlist = DB::table('wishlist')->where([['project_id',$Project[0]->project_id],['user_id',session()->get("user_id")]])->count();
    $Chat = DB::table('plan')->select('plan.type')->where([['raising_id',$Project[0]->raising_id],['expiry', '>=', date('Y-m-d')]])->get();
    return view('website.project.detail',['Project'=>$Project,'Similar' => $Similar,'url' => $url,'Wishlist' => $Wishlist,'Chat' => $Chat]);}

    public function Project_Premium(){
        return view('website.project.index',['category_id'=>0,'location_id'=>0,'keywords'=>0,'premium'=>1,'type' => 0]);
    }

    public function Redirect_To_Chat($code){
        $Project = DB::table('project')->leftjoin('raising','raising.raising_id','=','project.raising_id')->select('project.project_id','raising.raising_id')->where([['project.status',0],['project.code',$code]])->get();

        $insert = DB::table('chat')->insert(
            [
                'user_id' => session()->get("user_id"),
                'raising_id' => $Project[0]->raising_id,
                'project_id' => $Project[0]->project_id,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s')
            ]);
        $chat_id = DB::getPdo()->lastInsertId(); $code = md5($chat_id);
        $update = DB::table('chat')->wherechat_id($chat_id)->update(['code' => $code]);

        return redirect('/dashboard/user/chat');
    }
}
