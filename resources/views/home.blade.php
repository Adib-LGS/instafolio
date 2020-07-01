@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcone on InstaFolio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    You are logged in!
                    <br>
                    If you click on your username You'll be able to customize your profile.
                    <br>
                    Don't forget to follow your friends to update your daily news :)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
