<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
class category_controller extends Controller
{
    public function index(){
        return view('dashboard.category.index');
    }
    public function Insert(Request $request){
        if (session()->get("account_id")) {
            $id = time();
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $insert = DB::table('category')->insert(
                [
                    'name' => $request->name,
                    'url' => $url,
                    'id' => $id,
                    'account_id' => session()->get('account_id'),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $category_id = DB::getPdo()->lastInsertId(); $code = md5($category_id);
            $update = DB::table('category')->wherecategory_id($category_id)->update(['code' => $code]);

            if ($request->file('card')) {
                $card = $request->file('card');
                foreach($card as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/category/card/', $imgNameToStore);
                    $Update_Card = DB::table('category')->wherecategory_id($category_id)->update(['card' => $imgNameToStore]);
                }
            }

            return response()->json(['error' => false,'message'=>'Category Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['category.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['category.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['category.date','<=',$request->end_date];}
            $category = DB::table('category')->leftjoin('account','account.account_id','=','category.account_id')->select('category.name','category.status','category.code','category.date','category.category_id','category.card','account.name as account')->where($Where)->orderby('category.category_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.category.index',['category'=>$category]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $Get_Card = DB::table('category')->select('card')->wherecode($request->code)->get();
            $Card_path = public_path().'/uploads/category/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
            $category = DB::table('category')->wherecode($request->code)->delete();
            return response()->json(['error' => false,'message'=>'Category Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Edit($code){
        if (session()->get("account_id")) {
            $Edit = DB::table('category')->select('name','card','id')->where('code','=',$code)->get();
            return view('dashboard.category.edit',['Edit'=>$Edit,'code'=>$code]);
        }else{return response()->json(['error' => true]);}
    }
    public function Update(Request $request){
        if (session()->get("account_id")) {
            $id = $request->id;
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $update = DB::table('category')->wherecode($request->code)->update([
                'name' => $request->name,
                'url' => $url,
            ]);

            if ($request->file('card')) {
                $Get_Card = DB::table('category')->select('card')->wherecode($request->code)->get();
                $Card_path = public_path().'/uploads/category/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
                $card = $request->file('card'); foreach($card as $c){
                $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/category/card/', $imgNameToStore);
                $Update_Images = DB::table('category')->wherecode($request->code)->update(['card' => $imgNameToStore]);}
            }

            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("category")->select('status')->where('code','=',$request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_category = DB::table('category')->where('code', '=', $request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' Category Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_category = DB::table('category')->where('code', '=', $request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'Category Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
}
