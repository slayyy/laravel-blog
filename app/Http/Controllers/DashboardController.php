<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }

  public function index()
  {
    if(session('user')->role_id == 3) {
      $posts = Post::orderBy('created_at', 'DESC')->get();

      return view('dashboard.index', compact('posts'));
      
    }else if(session('user')->role_id == 2) {
      $users = session('user')->posts()->pluck('posts.user_id');

      $posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->get();
      
      return view('dashboard.index', compact('posts'));
    }
  }
}
