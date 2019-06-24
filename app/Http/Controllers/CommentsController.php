<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentsController extends Controller
{
  public function store($id)
  {
    $data = request()->validate([
      'comment' => 'required'
    ]);

    session('user')->comments()->create([
      "post_id" => $id,
      "comment" => $data["comment"]
    ]);

    return response()->json(Comment::where('post_id', $id)->get());
  }

  public function get($id)
  {
    return response()->json(Comment::where('post_id', $id)->get());
  }

  public function destroy($id)
  {
    Comment::find($id)->delete();

    return back();
  }
}
