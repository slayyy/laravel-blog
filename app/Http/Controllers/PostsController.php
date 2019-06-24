<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\User;

class PostsController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('created_at', 'DESC')->paginate(5);

    return view('posts.index', compact('posts'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    session('user')->posts()->create([
      'title' => $request->input()['title'],
      'content' => $request->input()['content']
    ]);
  }

  public function show(Post $post)
  {   
    $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'DESC')->get();
    // dd(session('user')->comments());
    return view('posts.show', compact(['post', 'comments']));
  }

  public function edit(Post $post, User $user)
  {
    $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'DESC')->get();
    
    return view('posts.edit', compact('post', 'comments', 'user'));
  }
  
  public function update($id)
  {
    $data = request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);
    
    Post::find($id)->update($data);

    return redirect('/dashboard');
  }

  public function destroy($id)
  {
    Post::find($id)->delete();

    return redirect('/dashboard');
  }
}
