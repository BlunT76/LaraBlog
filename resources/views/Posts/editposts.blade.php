@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::check())
    <div class="border border-default p-4 mb-4 shadow-sm rounded">
    <form action="/create" method="post">
        @csrf
        <div class="form-group mb-1">
            <label for="title">Title</label>
            <input class="form-control" name="title" type="text" value=" {{ $post->title }} ">
        </div>
        <div class="form-group mb-1">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" type="textarea" rows="10">{{ $post->content }}</textarea>
        </div>
        <div class="form-group mb-1">
            <button class="btn btn-secondary mt-1" type="submit" name="id" value="{{ $post->id }}">Ok</button>
        </div>
    </form>
    </div>
    @endif
</div>
@endsection
