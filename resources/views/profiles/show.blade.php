@extends('layouts.app')

@section('content')
            <div class="container">
                <div class="row mt-4">
                    <div class="col-4">
                        <img src="https://otakuusamagazine.com/wp-content/uploads/2018/08/nl-jet-black-cowboy-bebop.jpg" class="rounded-circle" width="150px" height="150px">
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-baseline">
                            <div class="h4 mr-3 pt-2">{{ $user->username }}</div>
                            <button class="btn btn-primary btn-sm ">S'abonner</button>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="mr-3"><strong>{{ $user->posts->count() }}</strong>@if($user->posts->count() > 1) publications @else publication @endif</div>
                            <div class="mr-3"><strong>0</strong> abonnés</div>
                            <div class="mr-3"><strong>0</strong> abonnement</div>
                        </div>
                            <a href="{{ route('profiles.edit', ['user' => $user->username]) }}" class="btn btn-info btn-sm mt-3">Edit Information</a>
                        <div class="mt-3">
                            <div class="font-weight-bold">{{ $user->profile->title }}</div>
                            <div>{{ $user->profile->description }}</div>
                            <a href="{{ $user->profile->url }}">My GitHub Profile</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    @foreach($user->posts as $post)
                    <div class="col-5">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        <img src="{{ asset('storage') . '/' . $post->image }}" class="w-100">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
@endsection