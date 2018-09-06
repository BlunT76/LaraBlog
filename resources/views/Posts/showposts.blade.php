@extends('layouts.app')

@section('content')
<div class="container">

            @foreach($posts as $val)
            <div class="card mb-5 shadow-sm">
                <div class="card-header">
                    <span>
                    <h5>{{ $val->title }}</h5> by {{ $val->author }}
                    </span>
                </div>

                <div class="card-body">
                    {{ $val->content }}<br>
                </div>
                <span class="text-right mr-2"><a class="btn btn-sm btn-outline-secondary mb-1" href="/show/{{ $val->id }}" >Show</a>

                @if(Auth::check())
                    @if ($val->author ==  Auth::user()->name )
                        <a class="btn btn-sm btn-outline-secondary mb-1" href="/edit/{{ $val->id }}">Edit</a>
                        <a class="btn btn-sm btn-outline-secondary mb-1" href="/remove/{{ $val->id }}">Delete</a></span>
                    @endif
                @endif
            </div>
            @endforeach

    {{ $posts->appends(['sort' => 'created_at'])->links() }}
</div>
@endsection
