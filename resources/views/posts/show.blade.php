@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8">
        <img src="{{ asset('storage') . '/' . $post->image }}" class="w-100">
    </div>
    <div class="col-4">
        <h3>{{ $post->user->username }}</h3>
        <p>{{ $post->caption }}</p>
    </div>
</div>

<form method="POST" action="{{ route('posts.destroy', '$post->image') }}" >
                        @csrf
                        @method('DELETE')
                           <input type="submit" class="btn btn-sm btn-danger" value="Delete"></input>
                    </form>
@endsection