<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
class location_controller extends Controller
{
    public function index(){
        return view('dashboard.location.index');
    }
    public function Insert(Request $request){
        if (session()->get("account_id")) {
            $id = time();
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $insert = DB::table('location')->insert(
                [
                    'name' => $request->name,
                    'url' => $url,
                    'id' => $id,
                    'account_id' => session()->get('account_id'),
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s')
                ]);
            $location_id = DB::getPdo()->lastInsertId(); $code = md5($location_id);
            $update = DB::table('location')->wherelocation_id($location_id)->update(['code' => $code]);

            if ($request->file('card')) {
                $card = $request->file('card');
                foreach($card as $c){
                    $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/location/card/', $imgNameToStore);
                    $Update_Card = DB::table('location')->wherelocation_id($location_id)->update(['card' => $imgNameToStore]);
                }
            }

            return response()->json(['error' => false,'message'=>'Location Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Category(){
        if (session()->get("account_id")) {
            $Category = DB::table('category')->select('category_id','name')->wherestatus(0)->get();
            return response()->json(['error' => false,'Category'=>$Category]);
        }else{return response()->json(['error' => true]);}
    }
    public function Get(Request $request){
        if (session()->get("account_id")) {
            $Where = [];
            if ($request->search != null) {$Where[] = ['location.name','LIKE','%'.$request->search.'%'];}
            if ($request->start_date != null) {$Where[] = ['location.date','>=',$request->start_date];}
            if ($request->end_date != null) {$Where[] = ['location.date','<=',$request->end_date];}
            $location = DB::table('location')->leftjoin('account','account.account_id','=','location.account_id')->select('location.name','location.status','location.code','location.date','location.location_id','location.card','account.name as account')->where($Where)->orderby('location.location_id',$request->orderby)->take($request->take)->get(); return view('dashboard.include.location.index',['location'=>$location]);
        }else{return response()->json(['error' => true]);}
    }
    public function Delete(Request $request){
        if (session()->get("account_id")) {
            $Get_Card = DB::table('location')->select('card')->wherecode($request->code)->get();
            $Card_path = public_path().'/uploads/location/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
            $location = DB::table('location')->wherecode($request->code)->delete();
            return response()->json(['error' => false,'message'=>'location Deleted Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Edit($code){
        if (session()->get("account_id")) {
            $Edit = DB::table('location')->select('name','card','id')->where('code','=',$code)->get();
            return view('dashboard.location.edit',['Edit'=>$Edit,'code'=>$code]);
        }else{return response()->json(['error' => true]);}
    }
    public function Update(Request $request){
        if (session()->get("account_id")) {
            $id = $request->id;
            $url = preg_replace('/[^a-zA-Z0-9_ -]/s','-',strtolower(str_replace(' ', '-', $request->name.'-'.$id)));
            $update = DB::table('location')->wherecode($request->code)->update([
                'name' => $request->name,
                'url' => $url,
            ]);

            if ($request->file('card')) {
                $Get_Card = DB::table('location')->select('card')->wherecode($request->code)->get();
                $Card_path = public_path().'/uploads/location/card/'.$Get_Card[0]->card; if (File::exists($Card_path)) { unlink($Card_path);}
                $card = $request->file('card'); foreach($card as $c){
                $img_ext = $c->getClientOriginalExtension(); $imgNameToStore = strtolower(str_replace(' ', '-',session()->get("account_id").'-'.$id.'-'.mt_rand(10000000, 99999999).'.'.$img_ext)); $c->move(public_path().'/uploads/location/card/', $imgNameToStore);
                $Update_Images = DB::table('location')->wherecode($request->code)->update(['card' => $imgNameToStore]);}
            }

            return response()->json(['error' => false,'message'=>'Changes Saved Successfully']);
        }else{return response()->json(['error' => true]);}
    }
    public function Status(Request $request){
        if (session()->get("account_id")) {
            $check = DB::table("location")->select('status')->where('code','=',$request->code)->get();
            if ($check[0]->status == 0) {
                $De_Active_location = DB::table('location')->where('code', '=', $request->code)->update(['status' => 1]);
                return response()->json(['error'=> false,'message'=> ' location Is De-Active Successfully']);}
            if ($check[0]->status == 1) {
                $Active_location = DB::table('location')->where('code', '=', $request->code)->update(['status' => 0]);
                return response()->json(['error'=> false,'message'=> 'location Is Active Successfully']);}
        }else{ return response()->json(['error'=>'logout']);}
    }
}
