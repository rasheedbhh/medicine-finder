<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Orders;
use App\Models\Pharmacist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $search = '';

    public function index(){
        //$medicines = Medicine::with('pharmacist')->latest()->get();
        $search = request()->query('search');
        $countOrders = DB::table('orders')->where('user_id',Auth::user()->id)->count();
        if($search){
           $medicines = Medicine::where('name','LIKE',"%{$search}%")->with('pharmacist')->simplePaginate(3);
        }
        else{
        $medicines = Medicine::orderBy('created_at')->with('pharmacist')->get();
           
        } 
        return view('user.index',compact('medicines','countOrders'));
    } 


        
    
    public function getPharmacist($id){
        $pharmacist = User::where('id',$id)->with('medicines')->first();
        return view('user.getPharmacist',compact('pharmacist'));
    }

    public function history($id){
        return view('user.history');
    }
    public function orderMedicine(Request $request){
        $data = array();
        $data['medicine_id'] = $request->medicine_id;
        $data['pharmacist_id']= $request->pharmacist_id;
        $data['user_id'] = Auth::user()->id;
        $data['created_at']= Carbon::now();
        $data['updated_at']= Carbon::now();
        $medicine_quantity = $request->medicine_quantity;
        $medicine_price = $request->medicine_price;
        $data['quantity'] = $request->quantity;
        if ($data['quantity'] > $medicine_quantity ) {
            $notification=array(
                'messege'=>'Sorry we do not have the quantity you asked for',
                'alert-type'=>'error'
                 );
                 return back()->with($notification);
        }
            else{
                $data['total_price'] = $medicine_price * $data['quantity'];
                $newQuantity = $medicine_quantity -  $data['quantity'] ;
                DB::table('orders')->insert($data);
                DB::table('medicines')->where('id',$data['medicine_id'])->limit(1)->update(['quantity'=>$newQuantity]);
                $notification=array(
                 'messege'=>'Successfully placed your order! Thank you for shopping with us',
                 'alert-type'=>'success'
                  );
                  return back()->with($notification);
            }

        
    }
    public function myOrders($id){
        $orders = Orders::orderBy('created_at')->with('pharmacist','medicine')->where('user_id',Auth::user()->id)->get();
        return view('user.history',compact('orders'));
    }
    public function deleteOrder($id,Request $request){

        Orders::where('id',$id)->delete(); 
        // $data = array();
        // $data['medicine_id'] =  $request->medicine_id;
        // $data['medicine_quantity'] = $request->medicine_quantity;
        // $data['order_quantity'] = $request->order_quantity;
        // $newQuantity =  $data['medicine_quantity']+$data['order_quantity'];
      $notification=array(
            'messege'=>'Successfully deleted your order!',
            'alert-type'=>'error'
             );

         return redirect()->back()->with($notification);
         
    }
}
