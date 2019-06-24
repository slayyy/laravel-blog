<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Comment;

class Post extends Model
{
  protected $guarded = [];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function comments()
  {
      return $this->belongsTo(Comment::class)->orderBy('created_at', 'DESC');        
  }
}
