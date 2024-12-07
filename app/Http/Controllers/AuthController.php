<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
public function loginform(){

return view('loginform');


}
public function login(Request $request){

 $credentials=$request->validate([
    
    'email' => 'required',
            'password' => 'required',
    
 ]);
// $credentials = $request->only('email', 'password');
if (Auth::attempt($credentials)){

    $request->session()->regenerate();

if(Auth::user()->role==='admin'){

return redirect()->route('admindashboard');

}elseif(Auth::user()->role==='user'){

return redirect()->route('userdashboard');


}

}
return back()->withErrors(['email'=>'The credentials not valid']);

}
public function admindashboard(){

return view('admin');

}
public function userdashboard(){

    return view('user');
}
public function logout(Request $request){
 Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();

return redirect('/loginform');
}

}
