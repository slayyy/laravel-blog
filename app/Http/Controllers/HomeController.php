<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
  public function index()
  {
    // dd(session('user'));
    return view('home');
  }
}
