<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use OCILob;

class AdminController extends Controller
{
    public function index(){
        if(Gate::denies('manage-users')){
            abort(403);
        }
        return view('admin.index');
    }
    
    public function addUser(){
        return view('admin.users.add');
    }
    public function addPharmacist(){
        return view('admin.pharmacists.add');
    }
    public function insertUser(Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone_number']= $request->phone_number;
        $data['password'] = Hash::make($request->password);
        $data['role_id']= 3;
        $data['created_at']= Carbon::now();
        $data['updated_at']= Carbon::now();
            DB::table('users')->insert($data);
            $notification=array(
                'messege'=>'Successfully created your account!',
                'alert-type'=>'success'
                 );
             return redirect()->route('allUsers')->with($notification);    
    }
    public function allUsers(){
        $users = DB::table('users')->where('role_id',3)->get();
        return view('admin.users.index',compact('users'));
    }
    
    public function editUser($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('admin.users.edit',compact('user'));
    }   
     public function updateUser($id,Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone_number']= $request->phone_number;
        $data['password'] = Hash::make($request->password);
        $data['updated_at']= Carbon::now();
            DB::table('users')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully updated user account!',
                'alert-type'=>'success'
                 );
             return redirect()->route('allUsers')->with($notification);  
    }

    public function deleteUser($id){
        $user = DB::table('users')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully deleted this user!',
            'alert-type'=>'error'
             );
         return redirect()->route('allUsers')->with($notification);  
    } 
    public function allPharmacists(){
        $pharmacists = DB::table('users')->where('role_id',2)->get();
        $total = Orders::with('pharmacist','medicine')->where('pharmacist_id',2)->get();
        return view('admin.pharmacists.index',compact('pharmacists','total'));
    }
    public function insertPharmacist(Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone_number']= $request->phone_number;
        $data['password'] = Hash::make($request->password);
        $data['role_id']= 2;
        $data['created_at']= Carbon::now();
        $data['updated_at']= Carbon::now();
        $data['pharmacy_name'] = $request->pharmacy_name;
        $data['pharmacy_address'] = $request->pharmacy_address;
            DB::table('users')->insert($data);
            $notification=array(
                'messege'=>'Successfully added a pharmacist account!',
                'alert-type'=>'success'
                 );
             return redirect()->route('allPharmacists')->with($notification);    
    }
    public function editPharmacist($id,Request $request){
        $pharmacist = DB::table('users')->where('id',$id)->first();
        return view('admin.pharmacists.edit',compact('pharmacist'));
    }
    public function updatePharmacist($id,Request $request){
        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone_number']= $request->phone_number;
        $data['password'] = Hash::make($request->password);

        $data['updated_at']= Carbon::now();
            DB::table('users')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully updated user account!',
                'alert-type'=>'success'
                 );
             return redirect()->route('allPharmacists')->with($notification);  
    }

    public function deletePharmacist($id){
        DB::table('users')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully deleted this pharmacist!',
            'alert-type'=>'error'
             );
         return redirect()->route('allPharmacists')->with($notification);  
    } 

    public function allMedicines(){
      /* $name =  DB::table('users')
               ->join('medicines','users.id', '=', 'medicines.pharmacist_id')
               ->select('users.name')
               ->get();  
      $medicines = DB::table('medicines')->get(); */
        $medicines = Medicine::orderBy('created_at')->with('pharmacist')->get();
        return view('admin.medicine.index',compact('medicines'));
    }
    public function allOrders(Request $request){
        //$orders = DB::table('orders')->get();
        $orders = Orders::orderBy('created_at')->with('pharmacist','user','medicine')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
