<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
      return view('auth.login');
    }

    public function login(Request $request)
    {
      $data = $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);

      $user = User::where('email', $data['email'])->first();

      if($user == null || !Hash::check(($data['password']), $user->password)) {
        $request->session()->flash('status', 'Email or password incorrect.');
        
        return back();
      }else if(Hash::check(($data['password']), $user->password) && $user->email == $data['email']) {
        $request->session()->put('user', $user);

        $request->session()->flash('status', "You're succefully logged in !");
        return redirect('/');
      }

    }
}
