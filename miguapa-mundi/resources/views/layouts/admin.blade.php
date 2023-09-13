<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Miguapa Mundi - Admin Panel')</title>
</head>
<nav class="bg-primary">
    <div class="row d-flex justify-content-center">
        <a class="navbar-brand text-center" href="{{route('admin.index')}}"><img class="img-logo" src="{{ asset('/img/LogoMiguapaMundi.png') }}" alt="logo miguapa mundi"></a>
        <a class="navbar-brand text-center" href="{{route('admin.index')}}">Miguapa Mundi</a>
    </div>
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{route('admin.news.index')}}">News</a>
                    <a class="nav-link active" href="{{route('admin.country.index')}}">Country</a>
                    <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                    <a class="nav-link active" href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
@yield('secondary-nav')
<div class="container my-4">
    @yield('content')
</div>