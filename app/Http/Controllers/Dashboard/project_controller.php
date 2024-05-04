<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class project_controller extends Controller
{
    public function index(){return view('dashboard.project.index');}
    public function Category(){
        if (session()->get("account_id")) {
            $category = DB::table('category')->select('category_id','name')->wherestatus(0)->get();
            return response()->json(['category' => $category]);
        }
    }
    public function Location(){
        if (session()->get("account_id")) {
            $location = DB::table('location')->select('location_id','name')->wherestatus(0)->get();
            return response()->json(['location' => $location]);
        }
    }
    public function Insert(Request $request){
        if (session()->get("account_id")) {
            $id = time();
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $insert = DB::table('project')->insert(
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'trading' => $request->trading,
                    'earning_type' => $request->earning_type,
                    'stock_level' => $request->stock_level,
                    'summary' => $request->summary,
                    'location_information' => $request->location_information,
                    'location_id' => $request->location_id,
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'id' => $id,
                    'url' => $url,
                    'account_id' => session()->get('account_id'),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $project_id = DB::getPdo()->lastInsertId(); $code = md5($project_id);
            $update = DB::table('project')->whereproject_id($project_id)->update(['code' => $code]);

            if ($request->file('card')) {
                $card = $request->file('card');
                foreach($card as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/project/card/', $imgNameToStore);
                    $Update_Card = DB::table('project')->whereproject_id($project_id)->update(['card' => $imgNameToStore]);
                }
            }

            return response()->json(['error' => false,'message'=>'project Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['project.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['project.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['project.date','<=',$request->end_date];}
            $project = DB::table('project')->leftjoin('account','account.account_id','=','project.account_id')->leftjoin('raising','raising.raising_id','=','project.raising_id')->select('project.name','project.status','project.code','project.date','project.card','project.views','project.premium','project.block','account.name as account','raising.first_name','raising.last_name','raising.code as raising_code')->where($Where)->orderby('project.project_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.project.index',['project'=>$project]);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("project")->select('status')->wherecode($request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_project = DB::table('project')->wherecode($request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' Project Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_project = DB::table('project')->wherecode($request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'Project Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
    public function Ban(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("project")->select('block')->wherecode($request->code)->get();
            if ($check[0]->block == 0) {
                $De_Active_project = DB::table('project')->wherecode($request->code)->update(['block' => 1]);
                return response()->json(['error'=> false,'message'=> ' Project Is Ban Successfully']);}
            if ($check[0]->block == 1) {
                $Active_project = DB::table('project')->wherecode($request->code)->update(['block' => 0]);
                return response()->json(['error'=> false,'message'=> 'Project Is Un Ban Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
    public function Edit($code){
        if (session()->get("account_id")) {
            $Edit = DB::table('project')->wherecode($code)->get();
            return view('dashboard.project.edit',['Edit'=>$Edit,'code'=>$code]);
        }else{return response()->json(['error' => true]);}
    }
    public function Update(Request $request){
        if (session()->get("account_id")) {
            $id = $request->id;
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $update = DB::table('project')->wherecode($request->code)->update([
                'name' => $request->name,
                'price' => $request->price,
                'trading' => $request->trading,
                'earning_type' => $request->earning_type,
                'stock_level' => $request->stock_level,
                'summary' => $request->summary,
                'location_information' => $request->location_information,
                'location_id' => $request->location_id,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'url' => $url,
            ]);

            if ($request->file('card')) {
                $Get_Card = DB::table('project')->select('card')->wherecode($request->code)->get();
                $Card_path = public_path().'/uploads/project/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
                $card = $request->file('card'); foreach($card as $c){
                $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/project/card/', $imgNameToStore);
                $Update_Images = DB::table('project')->wherecode($request->code)->update(['card' => $imgNameToStore]);}
            }

            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }

    // Images
    public function Project_Images($code){
        return view("dashboard.project.images",['code'=>$code]);
    }
    public function Project_Upload_Images(Request $request){
        if (session()->get("account_id")) {

            $project = DB::table('project')->select('images')->wherecode($request->code)->get();
            $Files_Name = json_decode($project[0]->images);
            $images = $request->file('images');
            foreach($images as $i){ $img_ext = $i->getClientOriginalExtension();
            $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.time().'-'.mt_rand(10000000, 99999999).'.'.$img_ext));
            $i->move(public_path().'/uploads/project/images/', $imgNameToStore); $Files_Name[] = $imgNameToStore;}
            $Update_Code = DB::table('project')->wherecode($request->code)->update(['images' => json_encode($Files_Name)]);
            return response()->json(['error'=>false,'message'=>'Images Uploaded Successfully']);
        }else{return response()->json(['error'=>'true','message'=>'session expire']);}
    }
    public function Project_Delete_Images(Request $request){
        if (session()->get("account_id")) {

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
        if (session()->get("account_id")) {
            $project = DB::table('project')->select('images')->wherecode($request->code)->get();
            return view('dashboard.include.project.images',['project'=>$project]);
        }else{return redirect('/dashboard/login');}
    }

}
