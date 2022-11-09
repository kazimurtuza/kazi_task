<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function adminLoginView(){
        return view('admin_login');
    }
    public function adminRegister(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',


        ]);
        $admin= new User();
        $admin->name=$request->first_name.' '.$request->last_name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->save();

        Auth::login($admin);
        return redirect('admin/index');
    }
    public function index(){
        return view('admin.index');
    }
    public function adminLogOut(){
        Auth::logout(Auth::user());
        return redirect()->back()->with('Successfully Logout');
    }

    public function login(Request $request){

         $info= User::where('email',$request->email)->get()->first();

         if($info){
            $is_admin=  Hash::check($request->password,$info->password);
            if($is_admin){
                Auth::login($info);
            }

             return redirect('admin/index');
         }
         return redirect()->back()->with('error','password or email is invalid');


    }
}
