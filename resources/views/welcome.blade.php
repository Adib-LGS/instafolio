<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Instafolio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Styles -->
        
        <style>
            @media (max-width: 767px) {
            .intro {
                font-size: 13px;
                text-align: left;
                display: flex; 
                text-align: left;
                flex-wrap: wrap;
                word-wrap: break-word;
                max-width: 20rem;
                padding-left: 25px;
                margin-bottom: 1rem;
            }
            }
            html, body {
                background-color: #fafafa;
                color: #262626;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-bottom: 100px;
            }

            .title {
                margin-top: 10rem;
                font-size: 84px;
            }

            .intro {
                text-align: left;
                display: flex; 
                text-align: left;
                flex-wrap: wrap;
                word-wrap: break-word;
                max-width: 50rem;
                padding-left: 25px;
                margin-bottom: 1rem;
            }
            .links > a {
                color: #0095f6;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links {
                margin-top: 50px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('posts.index') }}">All Posts</a>
                        <a href="{{ route('profiles.show', ['user' => Auth::user()->name]) }}" class="dropdown-item">My Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Instafolio
                </div>
                @guest
                <div class="intro">
                    Welcome to my portfolio,
                    My name is Adib Legastelois, 
                    I'm a web developer, back-end oriented. 
                    The goal is to highlight my various projects
                    in the form of the well-known social network "Instagram"
                    The application is functional, you can subscribe
                    follow me && post photos if you want to 
                    You can also find me in my profile by typing "Adib" in the search bar.
                    This application was developed with "Laravel 6" & "Vue.js"
                    as well as the "Intervention Image library". 
                    There is also a "GitHub" link to see the different code.
                </div>
                @endguest
                <div class="form-group w-100" >
                    @include('partials.search')
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://github.com/Adib-LGS">GitHub</a>
                </div>
            </p>
        </div>
    </body>
</html>
