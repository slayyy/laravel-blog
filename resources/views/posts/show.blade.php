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
</div>
@endsection
