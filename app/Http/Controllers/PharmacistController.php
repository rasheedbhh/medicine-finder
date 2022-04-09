<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
class PharmacistController extends Controller
{
    public function index(){
    if(Gate::denies('manage-medicine')){
        abort(403);
        return view('pharmacist.index');
    }

  
}  
    public function getMedicine($id){
        $id = Auth::user()->id;
        $medicines =   DB::table('medicines')->where('pharmacist_id',$id)->get();
        return view('pharmacist.all',compact('medicines'));

    }
    public function addMedicine(){
        return view('pharmacist.add');
    }
    public function insertMedicine(Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['price']=$request->price;
        $data['quantity']=$request->quantity;
        $data['description']=$request->description;
        $data['created_at']= Carbon::now();
        $data['updated_at']= Carbon::now();
        $image = $request->image;
        $data['pharmacist_id'] = Auth::user()->id;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1080)->save('images/medicines/'.$image_name);
            $data['image'] = 'images/medicines/'.$image_name;
          }
          DB::table('medicines')->insert($data);
           $notification=array(
            'messege'=>'Medicine added successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification); 
           //dd($data);

    }
    public function editMedicine($id){
        $medicine = DB::table('medicines')->where('id',$id)->first();
        return view('pharmacist.edit',compact('medicine'));
    }
  
    public function deleteMedicine($id){
        DB::table('medicines')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Medicine deleted successfully!',
            'alert-type'=>'error'
             );
           return Redirect()->back()->with($notification);     
    }
    public function updateMedicine(Request $request,$id){
        $data = array();
        $data['name']=$request->name;
        $data['price']=$request->price;
        $data['quantity']=$request->quantity;
        $data['description']=$request->description;
        $data['created_at']= Carbon::now();
        $data['updated_at']= Carbon::now();
        $image = $request->image;
        $old_image = $request->old_image;
        $data['pharmacist_id'] = Auth::user()->id;
        if($image){
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(720,480)->save('images/medicines'.$image_name);
            $data['image'] = 'images/medicines'.$image_name;  
            $notification=array(
            'messege'=>'Medicine edited successfully!',
            'alert-type'=>'success'
             );
          }
          else{
            $data['image'] = $old_image;
            $notification=array(
                'messege'=>'Blog post updated successfully without image',
                'alert-type'=>'warning'
                 );
          }
          DB::table('medicines')->where('id',$id)->update($data);
         
           return Redirect()->back()->with($notification); 
           //dd($data);

    }
    public function myOrders(){
        $orders = Orders::orderBy('created_at')->with('user','medicine')->where('pharmacist_id',Auth::user()->id)->get();
        return view('pharmacist.orders',compact('orders'));
    }
}
