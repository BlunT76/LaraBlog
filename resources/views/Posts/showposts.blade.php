@extends('layouts.app')

@section('content')
<div class="container">

            @foreach($posts as $val)
            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <span>
                    <h5>{{ $val->title }}</h5> by {{ $val->author }}
                    </span>
                </div>

                <div class="card-body">
                    {{ $val->content }}<br>
                </div>
                <!-- <span class="text-left ml-2">Comment: </span> -->
                <span class="text-right mr-2"><a href="/show/{{ $val->id }}" >Show</a>

                @if(Auth::check())
                    @if ($val->author ==  Auth::user()->name )
                        <a href="/edit/{{ $val->id }}">Edit</a>
                        <a href="/remove/{{ $val->id }}">Delete</a></span>
                    @endif
                @endif
            </div>
            @endforeach

    {{ $posts->appends(['sort' => 'created_at'])->links() }}
</div>
@endsection
