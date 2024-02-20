<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegesterController extends Controller
{
    //
    public function index(){
        return view('sign-up');
    }

    public function insert(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:10|confirmed'
            
        ]);
        
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password) 
        ]);
        Auth::login($user);
        return redirect()->intended('/');

    }

    public function check(Request $request){
        
        

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // تم تحقق المستخدم بنجاح
            return redirect()->intended('/');
           
        } else {
            return redirect()->back()->withErrors('تحقق من البريد الإلكترونى و كلمة السر')->withInput();
        }
    }

    public function logout(){
    
        Auth::logout();
        

        return redirect('/');
    }
}
