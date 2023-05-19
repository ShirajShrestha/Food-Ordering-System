<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        // if(Auth::guard('admin')->check()){
            return view('admin.login');
        // }
    }

    public function postLogin(Request $request){
        $admin = new Admin();
        $data = $request->all();


        if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
            // dd("success");
            return view('template.master');
        }else{
             return redirect()->back()->with('error message','sorry couldnt login');
            // dd ("sorry");
        }
       
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('menu.index');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
        return view('dashboard');
    }

    public function registration()
    {
        return view('admin.registration');
    }

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $data['password'] = bcrypt($request ->password);
        $user = Admin::create($data);
         
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
        //dd($data);
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
      Auth::guard('admin')->logout();
      session::flash('info_message', 'Logout');
  
        return Redirect('login');
    }

    public function checkMD()
    {
    	dd('You are in Controller Method');
    }
}
