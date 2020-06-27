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

@can('delete', $post->user->profile)
<form method="POST" action="{{ route('posts.destroy', ['post' => $post->image]) }}" >
    @csrf
    @method('DELETE')
    <button  class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete these post ?')">Delete</button>
</form>
@endcan
@endsection