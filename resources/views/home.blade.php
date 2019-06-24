@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('user'))
      @if(session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    @endif
</div>
@endsection
