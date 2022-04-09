<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    if(Auth::user()->role_id == 1){
        return view('admin.index');
    }
    if(Auth::user()->role_id == 2){
        return view('pharmacist.index');
    }
    if(Auth::user()->role_id == 3){
    return redirect()->route('user.home');
 }   
}
}
