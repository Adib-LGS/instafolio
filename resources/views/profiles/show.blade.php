@extends('layouts.app')

@section('content')
            <div class="container">
@if(session('status'))
            <div class="alert alert-success">
                <strong>{{ session('status') }}</strong> 
            </div>
@endif
                <div class="row mt-4">
                    <div class="col-4">
                        @if($user->profile->image != null)
                        <img src="/storage/avatars/{{ $user->profile->image }}" class="rounded-circle" width="150px" height="150px">
                        @else
                            <img src="https://www.recia.fr/wp-content/uploads/2018/10/default-avatar-300x300.png" class="rounded-circle" width="150px" height="150px">
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-baseline">
                            <div class="h4 ml-3 mr-3 pt-2">{{ $user->username }}</div>
                            @can('follow', $user->profile)
                            <follow-button profile-id="{{ $user->profile->id }}" follows="{{ $follows }}"></follow-button>
                            @endcan
                        </div>
                        <div class="d-flex mt-3 ml-3">
                            <div class="mr-3"><strong>{{ $postCount }}</strong>@if($user->posts->count() > 1) posts @else post @endif</div>
                            <div class="mr-3"><strong>{{ $followersCount }}</strong> followers</div>
                            <div class="mr-3"><strong>{{ $followingCount }}</strong> following</div>
                        </div>
                            @can('update', $user->profile)
                            <a href="{{ route('profiles.edit', ['user' => $user->username]) }}" class="btn btn-info btn-sm mt-3 ml-3">Edit Profile</a>
                            @endcan
                        <div class="ml-3 mt-3">
                            <div class="font-weight-bold"><p>{{ $user->profile->title }}</p></div>
                            <div class="text-desc"><p>{{ $user->profile->description }}</p></div>
                            <a href="{{ $user->profile->url }}"><p>{{ $user->profile->url }}</p></a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    @foreach($user->posts as $post)
                    <div class="col-6 mb-3">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        <img src="{{ asset('storage') . '/posts/' . $post->image }}" class="w-100">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
@endsection