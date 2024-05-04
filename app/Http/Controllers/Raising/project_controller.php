<?php

namespace App\Http\Controllers\Raising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class project_controller extends Controller
{
    public function index(){
        $Project = DB::table('project')->whereraising_id(session()->get("raising_id"))->count();
        $Plan = DB::table('plan')->whereraising_id(session()->get("raising_id"))->count();
        if ($Project >= $Plan) {
            $check = 1;
        } else {
            $check = 0;
        }
        return view('raising.project.index', ['check' => $check]);
    }
    public function Create(){
        if (session()->get("plan_type") != 3) {
            $Project = DB::table('project')->whereraising_id(session()->get("raising_id"))->count();
            $Plan = DB::table('plan')->whereraising_id(session()->get("raising_id"))->count();
            if ($Project >= $Plan) {
                return redirect("/pricing");
            }
        }
        
        return view('raising.project.create');
    }
    public function Category(){
        if (session()->get("raising_id")) {
            $category = DB::table('category')->select('category_id','name')->wherestatus(0)->get();
            return response()->json(['category' => $category]);
        }
    }
    public function Location(){
        if (session()->get("raising_id")) {
            $location = DB::table('location')->select('location_id','name')->wherestatus(0)->get();
            return response()->json(['location' => $location]);
        }
    }
    public function Insert(Request $request){
        if (session()->get("raising_id")) {
            // dd($request->franchise);
            if (session()->get("plan_type") != 3) {
                $Project = DB::table('project')->whereraising_id(session()->get("raising_id"))->count();
                $Plan = DB::table('plan')->whereraising_id(session()->get("raising_id"))->count();
                if ($Project >= $Plan) {
                    return response()->json(['error' => true,'message'=>'Unlock the power to list your advertisement by making an ad purchase. Please visit our pricing page to choose the option that best suits your needs.']);
                }
            }
            $id = time();
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $insert = DB::table('project')->insert(
                [
                    'name' => $request->name,
                    'trading' => $request->trading,
                    'earning_type' => $request->earning_type,
                    'stock_level' => $request->stock_level,
                    'summary' => $request->summary,
                    'location_information' => $request->location_information,
                    'location_id' => $request->location_id,
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'skills' => $request->skills,
                    'potential' => $request->potential,
                    'hours' => $request->hours,
                    'staff' => $request->staff,
                    'lease' => $request->lease,
                    'business_established' => $request->business_established,
                    'training' => $request->training,
                    'awards' => $request->awards,
                    'reason_for_sale' => $request->reason_for_sale,
                    'seeking_investment' => $request->seeking_investment,
                    'reported_sales' => $request->reported_sales,
                    'run_rate_sales' => $request->run_rate_sales,
                    'EBITDA_margin' => $request->EBITDA_margin,
                    'industry' => $request->industry,
                    'assets_or_collateral' => $request->assets_or_collateral,
                    'interested_to_connect_with_advisors' => $request->interested_to_connect_with_advisors,
                    'business_overview' => $request->business_overview,
                    'products_and_dervices_overview' => $request->products_and_dervices_overview,
                    'assets_overview' => $request->assets_overview,
                    'facilities_overview' => $request->facilities_overview,
                    'capitalization_overview' => $request->capitalization_overview,
                    'franchise' => $request->franchise,
                    'type' => session()->get("type"),
                    'id' => $id,
                    'url' => $url,
                    'raising_id' => session()->get('raising_id'),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $project_id = DB::getPdo()->lastInsertId(); $code = md5($project_id);
            $update = DB::table('project')->whereproject_id($project_id)->update(['code' => $code]);

            if (session()->get("type") == 2) {
                $update = DB::table('project')->whereproject_id($project_id)->update(['price' => $request->price]);
            }

            if ($request->file('card')) {
                $card = $request->file('card');
                foreach($card as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("raising_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/project/card/', $imgNameToStore);
                    $Update_Card = DB::table('project')->whereproject_id($project_id)->update(['card' => $imgNameToStore]);
                }
            }

            if ($request->file('images')) {
                $Files_Name = [];
                $images = $request->file('images');
                foreach($images as $i){ $img_ext = $i->getClientOriginalExtension();
                $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("raising_id").'-'.time().'-'.mt_rand(10000000, 99999999).'.'.$img_ext));
                $i->move(public_path().'/uploads/project/images/', $imgNameToStore); $Files_Name[] = $imgNameToStore;}
                $Update_Code = DB::table('project')->whereproject_id($project_id)->update(['images' => json_encode($Files_Name)]);
            }

            return response()->json(['error' => false,'message'=>'Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Get(Request $request){
        if (session()->get("raising_id")) {
            $Where = [['project.raising_id',session()->get("raising_id")]];
            if ($request->search != null) {$Where[] = ['project.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['project.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['project.date','<=',$request->end_date];}
            $project = DB::table('project')->select('project.name','project.status','project.code','project.date','project.views','project.rating','project.premium','project.sold','project.block','project.url','franchise')->where($Where)->orderby('project.project_id',$request->orderby)->take($request->take)->get(); return view('raising.include.project.index',['project'=>$project]);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("raising_id")) {
            $check = DB::table("project")->select('status')->wherecode($request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_project = DB::table('project')->wherecode($request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_project = DB::table('project')->wherecode($request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> ' Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
    public function Edit($code){
        if (session()->get("raising_id")) {
            $Edit = DB::table('project')->wherecode($code)->get();
            return view('raising.project.edit',['Edit'=>$Edit]);
        }else{return response()->json(['error' => true]);}
    }
    public function Update(Request $request){
        if (session()->get("raising_id")) {
            
            $Field_Required = ['location_id','category_id'];
            for ($i=0; $i < count($Field_Required); $i++) {if ($request->{$Field_Required[$i]} == null) { return response()->json(['error' => true,'message' => $Field_Required[$i].' Not Found']); }}

            $id = $request->id;
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $update = DB::table('project')->wherecode($request->code)->update([
                'name' => $request->name,
                'trading' => $request->trading,
                'earning_type' => $request->earning_type,
                'stock_level' => $request->stock_level,
                'summary' => $request->summary,
                'location_information' => $request->location_information,
                'location_id' => $request->location_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'skills' => $request->skills,
                'potential' => $request->potential,
                'hours' => $request->hours,
                'staff' => $request->staff,
                'lease' => $request->lease,
                'business_established' => $request->business_established,
                'training' => $request->training,
                'awards' => $request->awards,
                'reason_for_sale' => $request->reason_for_sale,
                'seeking_investment' => $request->seeking_investment,
                'reported_sales' => $request->reported_sales,
                'run_rate_sales' => $request->run_rate_sales,
                'EBITDA_margin' => $request->EBITDA_margin,
                'industry' => $request->industry,
                'assets_or_collateral' => $request->assets_or_collateral,
                'interested_to_connect_with_advisors' => $request->interested_to_connect_with_advisors,
                'business_overview' => $request->business_overview,
                'products_and_dervices_overview' => $request->products_and_dervices_overview,
                'assets_overview' => $request->assets_overview,
                'facilities_overview' => $request->facilities_overview,
                'capitalization_overview' => $request->capitalization_overview,
                'url' => $url,
                'franchise' => $request->franchise,
            ]);

            if (session()->get("type") == 2) {
                $update = DB::table('project')->wherecode($request->code)->update(['price' => $request->price]);
            }

            if ($request->file('card')) {
                $Get_Card = DB::table('project')->select('card')->wherecode($request->code)->get();
                $Card_path = public_path().'/uploads/project/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
                $card = $request->file('card'); foreach($card as $c){
                $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("raising_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/project/card/', $imgNameToStore);
                $Update_Images = DB::table('project')->wherecode($request->code)->update(['card' => $imgNameToStore]);}
            }

            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }

    // Images
    public function Project_Images($code){
        return view("raising.project.images",['code'=>$code]);
    }
    public function Project_Upload_Images(Request $request){
        if (session()->get("raising_id")) {

            $project = DB::table('project')->select('images')->wherecode($request->code)->get();
            $Files_Name = json_decode($project[0]->images);
            $images = $request->file('images');
            foreach($images as $i){ $img_ext = $i->getClientOriginalExtension();
            $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("raising_id").'-'.time().'-'.mt_rand(10000000, 99999999).'.'.$img_ext));
            $i->move(public_path().'/uploads/project/images/', $imgNameToStore); $Files_Name[] = $imgNameToStore;}
            $Update_Code = DB::table('project')->wherecode($request->code)->update(['images' => json_encode($Files_Name)]);
            return response()->json(['error'=>false,'message'=>'Images Uploaded Successfully']);
        }else{return response()->json(['error'=>'true','message'=>'session expire']);}
    }
    public function Project_Delete_Images(Request $request){
        if (session()->get("raising_id")) {

            $project = DB::table("project")->select('images')->wherecode($request->code)->get();
            $ALL = json_decode($project[0]->images); $count = count($ALL);
            if ($count > 1) {
                foreach($ALL as $A){
                    if ($A != $request->image) {
                        $New[] = $A;
                    }else {
                        $Card_path = public_path().'/uploads/project/images/'.$request->image; if (File::exists($Card_path)) { unlink($Card_path);}
                    }
                }
            }else{ $New = []; }
            $Eecode = json_encode($New);
            $Update_Images = DB::table('project')->wherecode($request->code)->update([
                'images' => $Eecode,
            ]);

            return response()->json(['error' => false,'message'=>'Images Deleted Successfully']);
        }else{ return response()->json(['error'=>'logout']);}
    }
    public function Project_Get_Images(Request $request){
        if (session()->get("raising_id")) {
            $project = DB::table('project')->select('images')->wherecode($request->code)->get();
            return view('raising.include.project.images',['project'=>$project]);
        }else{return redirect('/raising/login');}
    }
    public function Premium(Request $request){
        if (session()->get("raising_id")) {
            // Check Subscription Limit
            $Check = DB::table('project')->where([['raising_id',session()->get("raising_id")],['premium', 1]])->count();

            if (session()->get("plan_type") == 0) {
                return response()->json(['error' => true,'message'=>'Your Subscription Are Not Active Yet! Unlock Premium Subscription']);
            }elseif (session()->get("plan_type") == 1) {
                return response()->json(['error' => true,'message'=>'Please Upgrade Your Subscription ! Try Again']);
            }

            // if (session()->get("plan_type") == 0) {
            //     return response()->json(['error' => true,'message'=>'Your Subscription Are Not Active Yet! Unlock Premium Subscription']);
            // }elseif (session()->get("plan_type") == 1) {
            //     if ($Check >= 5) {
            //         return response()->json(['error' => true,'message'=>'Limit Exceed! Upgrade Your Subscription And Try Again']);
            //     }
            // }elseif (session()->get("plan_type") == 2) {
            //     if ($Check >= 10) {
            //         return response()->json(['error' => true,'message'=>'Limit Exceed! Upgrade Your Subscription And Try Again']);
            //     }
            // }elseif (session()->get("plan_type") == 3) {
            //     if ($Check >= 15) {
            //         return response()->json(['error' => true,'message'=>'Limit Exceed! Upgrade Your Subscription And Try Again']);
            //     }
            // }

            $project = DB::table('project')->where([['code',$request->code],['raising_id',session()->get("raising_id")]])->update(['premium' => 1]);
            return response()->json(['error' => false,'message'=>' Is Become Premium Successfully']);
        }else{return response()->json(['error'=>'logout']);}
    }
    public function Sold(Request $request){
        if (session()->get("raising_id")) {
            $project = DB::table('project')->where([['code',$request->code],['raising_id',session()->get("raising_id")]])->update(['sold' => 1]);
            $Plan = DB::table('plan')->whereraising_id(session()->get("raising_id"))->update(['status' => 1]);
            return response()->json(['error' => false,'message'=>' Is Become Sold Out Successfully']);
        }else{return response()->json(['error'=>'logout']);}
    }
}
