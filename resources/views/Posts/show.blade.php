@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Show post -->
    <div class="card mb-3 shadow-sm">
        <div class="card-header"><span><h5>{{ $post->title }}</h5>  by {{ $post->author }}</span></div>
        <div class="card-body">
            {{ $post->content }}
        </div>
        <span class="text-right mr-2"><a href="/posts">Back</a>
            @if(Auth::check())
                @if ($post->author == Auth::user()->name )
                    <a href="/edit/{{ $post['id'] }}">Edit</a>
                    <a href="/remove/{{ $post['id'] }}">Delete</a>
                @endif
            @endif
        </span>
    </div>
    <!-- Add comment -->
    @if(Auth::check())
    <div class="border border-default p-4 mb-4 shadow-sm rounded">
    
    <form action="/addcomment" method="post">
        @csrf
        <div class="form-group mb-1">
        <label for="content">Add comment</label>
        <textarea class="form-control" name="content" type="textarea" rows="3"></textarea>
        </div>
        <button class="btn btn-secondary mt-1" name="id" value="{{ $post->id }}" type="submit">Ok</button>

    </form>
    </div>
    @endif

    <!-- Show comments -->
    <div class="border border-default p-4 shadow-sm rounded">
    <h5 class="text-center">Comments</h5>
    @foreach($comments as $val)
    <div class="card mt-3 mb-3 border border-default">
    <div class="card-header">{{ $val->author }}</div>
    <div class="card-body">
        {{ $val->content }}
    </div>
    </div>
    @endforeach
    {{ $comments->links() }}
    </div>
</div>


@endsection
