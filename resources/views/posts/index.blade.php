@extends('layouts.app')

@section('content')
<div class="container">
@foreach($posts as $post)
    <div class="row bg-white mb-5 p-3">
        <div class="col-9">
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>Author : </strong>{{ $post->user->name }}</div>
            </div>
            <div class="d-flex">
                <div class="col-8 offset-2"><strong>Title : </strong>{{ $post->title }}</div>
            </div>
            <div class="col-8 offset-2 pt-3">
                <a href="/p/{{ $post->id }}" class="btn btn-primary">Read More ...</a>
            </div>
        </div>
    </div>
@endforeach
<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>
</div>
@endsection
