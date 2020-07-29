<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>InstaFolio</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
         <!-- Core theme CSS (includes Bootstrap)-->
         <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        @if (Route::has('login'))
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
                <img src="{{ asset('svg/pyramid(1).svg') }}" class="pr-3" style="width: 4rem;" alt=""></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('posts.index') }}">Friend's Posts</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('profiles.show', ['user' => Auth::user()->name]) }}">My Profile</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                    </ul>
                </div>
            </div>
            @endif
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Instafolio</h1>
                    <h2 class="text-white-50 mx-auto mt-5">Welcome to my portfolio</h2>
                    <p class="text-white text-center">My name is Adib Legastelois<br> 
                            I'm a web developer Jr, back-end oriented(Laravel 6).</p>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                    @guest
                        <p class="text-white">
                            This application is functional, you can subscribe
                            follow && add posts. <br>
                            You can also find my profile by typing "Adib" in the search bar bellow. <br>
                            There is also a "GitHub" link to see my work.<br>
                            PS: To register, you can use an imaginary email.
                        </p>
                    @endguest
                    </div>
                </div>
            </div>
        </section>
           <!-- <div id="app2">
                    <div class="container">
                        <cookie-banner></cookie-banner>
                    </div>
                </div>-->
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                            @include('partials.search')
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">7777 HireMe Street, Montreal CA</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="#!">adib.legastelois@icloud.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+1 (555) 902-8832</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://github.com/Adib-LGS"><i class="fab fa-github"></i></a>
                </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container">Copyright © Adib Patrice Legastelois 2020</div>
        </footer>
        <!-- Bootstrap core JS-->
        <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    </body>
</html>
