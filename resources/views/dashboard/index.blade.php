@extends('layouts.app')

@section('content')
<div class="container">
@foreach($posts as $post)
    <div class="row bg-white mb-5 p-3">
        <div class="col-9">
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>ID : </strong>{{ $post->id }}</div>
            </div>
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>Author : </strong>{{ $post->user->name }}</div>
            </div>
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>Title : </strong>{{ $post->title }}</div>
            </div>

        </div>
        <div class="col-3 d-flex align-items-center">
            <a href="/p/{{ $post->id }}/edit" class="pr-3">Edit</a>
            <form action="/p/delete/{{ $post->id }}/" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
@endforeach
</div>
@endsection
