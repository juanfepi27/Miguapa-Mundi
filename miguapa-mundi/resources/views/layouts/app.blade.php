<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Miguapa Mundi')</title>
</head>
<body>
<!-- header -->
<nav class="bg-primary">
    <div class="row d-flex justify-content-center">
        <a class="navbar-brand text-center" href="{{ route('country.index') }}"><img class="img-logo" src="{{ asset('/img/LogoMiguapaMundi.png') }}" alt="logo miguapa mundi"></a>
        <a class="navbar-brand text-center" href="{{ route('country.index') }}">Miguapa Mundi</a>
    </div>
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="container ">
        @auth
            <div>
                User: {{ request()->user()->getUsername() }}  Budget: $ {{ request()->user()->getBudgetFormatted() }}
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('country.index') }}">Countries</a>
                    <a class="nav-link active" href="{{route('offer.toMe')}}">Offers</a>
                    <a class="nav-link active" href="{{ route('alliance.index') }}">Alliances</a>
                    <a class="nav-link active" href="{{ route('news.index')}}">News</a>
                    <a class="nav-link active" href="{{ route('profile.index')}}">Profile</a>
                    <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                    <form id="logout" action="{{ route('logout') }}" method="POST"> 
                        <a role="button" class="nav-link active" 
                        onclick="document.getElementById('logout').submit();">Logout</a> 
                        @csrf 
                    </form> 
                </div>
            </div>
        @else
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('login') }}">Login</a> 
                    <a class="nav-link active" href="{{ route('register') }}">Register</a> 
                </div>
            </div>
        @endauth
        </div>
    </div>
</nav>
@yield('secondary-nav')
<!-- header -->

<!-- messages -->
@if($errors->any())
<ul id="errors" class="alert alert-danger list-unstyled alert-dismissible fade show" role="alert">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</ul>
@endif
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- messages -->

<div class="container my-4">
    @yield('content')
</div>

<!-- footer -->
<div class="bg-primary py-1 text-center">
    <div class="container pb-2 in-front">
        <small>
            Author - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Maria Paula Ayala Lizarazo
            </a><br>
            Author - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Miguel Ángel Calvache Giraldo
            </a><br>
            Author - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Juan Felipe Pinzón Trejo
            </a>
        </small>
    </div>
    <div>
        <div>
            <img class="opacity-75 img-logo" src="{{ asset('/img/LogoMiguapaTeam.png') }}" alt="logo miguapa">
            <p class="fw-bold pt-2">Copyright - Miguapa</p>
        </div>
    </div>
</div>
<!-- footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/6f83f56a7b.js" crossorigin="anonymous"></script>
</body>
</html>
