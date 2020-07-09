@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row mt-3 mb-3">
            <div class="col-10 offset-1">
                <div>
                <strong>{{ $post->user->username }}</strong>
                </div>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <img src="{{ asset('storage') . './posts/' . $post->image }}" class="w-100">
                </a>
                    <div>
                        Posted by: <strong>{{ $post->user->username }}</strong> {{ $post->created_at->format('m-d-Y') }}
                    </div>
                    <hr>
            </div>
        </div>
    @endforeach

    <div class="col-12">
        <div class="row d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection