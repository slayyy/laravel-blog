<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }
  public function register(Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      "password_confirmation" => "required"
    ]);
  
    if($data['password'] != $data['password_confirmation']) {
      $request->session()->flash('status', 'Password fields are different.');

      return back();
    }else {
      $user = New User();
      $user->name =$data['name'];
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);
      $user->save();

      $user = User::where('email', $data['email'])->first();      
      $request->session()->put('user', $user);

      $request->session()->flash('status', "You're succefully register !");
      return redirect('/');
    }
  }
}
