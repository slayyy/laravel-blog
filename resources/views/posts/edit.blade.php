@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/edit/{{ $post->id }}" method="POST">
    @csrf
    @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
            <h1>Edit Post</h1>
                <div class="form-group row">
                    <label for="title">Post Title</label>
                    <input id="title" type="text" name="title" class="form-control" value="{{ $post->title }}" autocomplete="title" autofocus>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3" autocomplete="content" autofocus>{{ $post->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Edit Post</button>
                </div>
            </div>
        </div>
    </form>

    @foreach($comments as $comment)
    <div class="row bg-white p-2 pt-4 mt-5">
        <div class="col-9">
            <div><strong>ID : </strong>{{ $comment->id }}</div>
            <div><strong>ID Post : </strong>{{ $comment->post_id }}</div>
            <strong>{{ $comment->user->name }}</strong>
            <p class="mt-3">
                {{ $comment->comment }}
            </p>
            <p class="mt-3">
                {{ $comment->created_at }}
            </p>
        </div>
        <div class="col-3 d-flex align-items-center">
            <form action="/comment/delete/{{ $comment->id }}/" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection
