@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
    <div class="h2 ml-3 mr-3 mb-3 pt-2">{{ $post->user->username }}</div>
        <img src="{{  Storage::disk('s3')->url('posts/' . $post->filename) }}" class="w-100">
    </div>
    <div class="col-4">
        <h3>{{ $post->user->username }}</h3>
        <p>{{ $post->caption }}</p>
    </div>
    @can('delete', $post->user->profile)
<form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}" >
    @csrf
    @method('DELETE')
    <button type="submit"  class="btn btn-sm btn-danger ml-3" onclick="return confirm('Do you want to delete these post ?')">Delete</button>
</form>
@endcan
</div>
@endsection