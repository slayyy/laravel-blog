@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white mb-5 p-3">
        <div class="col-9">
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>Title : </strong>{{ $post->title }}</div>
            </div>
            <div class="col-8 offset-2 pt-3"><strong>Content : </strong></div>
            <div class="col-8 offset-2 pt-3">{{ $post->content }}</div>
        </div>
    </div>

    <create-comment post="{{ $post->id }}"></create-comment>

    @foreach($comments as $comment)
    <div class="row bg-white p-2 pt-4 mt-5">
        <div class="col-9">
            <strong>{{ $comment->user->name }}</strong>
            <p class="mt-3">
                {{ $comment->comment }}
            </p>
            <p class="mt-3">
                {{ $comment->created_at }}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection
