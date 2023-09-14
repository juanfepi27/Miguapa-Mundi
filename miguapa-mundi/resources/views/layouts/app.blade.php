<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Miguapa Mundi')</title>
</head>
<body class="d-flex flex-column min-vh-100 overflow-x-hidden">
<!-- header -->
<nav class="bg-primary">
    <div class="row d-flex justify-content-center">
        <a class="navbar-brand text-center" href="{{ route('country.index') }}"><img class="img-logo" src="{{ asset('/img/LogoMiguapaMundi.png') }}" alt="logo miguapa mundi"></a>
        <a class="navbar-brand text-center" href="{{ route('country.index') }}">Miguapa Mundi</a>
    </div>
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="container ">
        @auth
            <div class="d-flex">
                @lang('layouts.app.navUser'): {{ request()->user()->getUsername() }}
                <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                @lang('layouts.app.navBudget'): $ {{ request()->user()->getBudgetFormatted() }}
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('country.index') }}">@lang('layouts.app.aCountries')</a>
                    <a class="nav-link active" href="{{route('offer.toMe')}}">@lang('layouts.app.aOffers')</a>
                    <a class="nav-link active" href="{{ route('alliance.index') }}">@lang('layouts.app.aAlliances')</a>
                    <a class="nav-link active" href="{{ route('news.index')}}">@lang('layouts.app.aNews')</a>
                    <a class="nav-link active" href="{{ route('profile.index')}}">@lang('layouts.app.aProfile')</a>
                    <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                    @if(request()->user()->getRole()==1)
                        <a class="nav-link active " href="{{ route('admin.index') }}">@lang('layouts.app.aPanel')</a>
                    @endif
                    <form id="logout" action="{{ route('logout') }}" method="POST"> 
                        <a role="button" class="nav-link active" 
                        onclick="document.getElementById('logout').submit();">@lang('layouts.app.aLogout')</a> 
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
                    <a class="nav-link active" href="{{ route('login') }}">@lang('layouts.app.aLogin')</a> 
                    <a class="nav-link active" href="{{ route('register') }}">@lang('layouts.app.aRegister')</a> 
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
<div class="bg-primary py-1 text-center mt-auto">
    <div class="container pb-2 in-front">
        <small>
            @lang('layouts.app.footAuthorMapa') - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Maria Paula Ayala Lizarazo
            </a><br>
            @lang('layouts.app.footAuthorMigue') - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Miguel Ángel Calvache Giraldo
            </a><br>
            @lang('layouts.app.footAuthorJuan') - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/juan-felipe-pinzón-trejo-319711247">
            Juan Felipe Pinzón Trejo
            </a>
        </small>
    </div>
    <div>
        <div>
            <img class="opacity-75 img-logo" src="{{ asset('/img/LogoMiguapaTeam.png') }}" alt="logo miguapa">
            <p class="fw-bold pt-2">@lang('layouts.app.footCopyright') - Miguapa</p>
        </div>
    </div>
</div>
<!-- footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/6f83f56a7b.js" crossorigin="anonymous"></script>
</body>
</html>
