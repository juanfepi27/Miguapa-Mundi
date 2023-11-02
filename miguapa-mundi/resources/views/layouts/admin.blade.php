
<!-- Author: Miguel Ángel Calvache -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('layouts.admin.titleTemplate'))</title>
</head>
<body class="d-flex flex-column min-vh-100 overflow-x-hidden">
<!-- header -->
<nav class="bg-primary">
    <a class="w-50 nav-link dropdown-toggle m-3 position-absolute top-0 start-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">@lang('layouts.app.aLang')</a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('lang.changeLang',['locale'=>'en'])}}">@lang('layouts.app.aEnglish')</a></li>
        <li><a class="dropdown-item" href="{{route('lang.changeLang',['locale'=>'es'])}}">@lang('layouts.app.aSpanish')</a></li>
    </ul>
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
                    <a class="nav-link active" href="{{route('admin.news.index')}}">@lang('layouts.admin.aNews')</a>
                    <a class="nav-link active" href="{{route('admin.country.index')}}">@lang('layouts.admin.aCountry')</a>
                    <div class="vr bg-black mx-2 d-none d-lg-block"></div>
                    <a class="nav-link active" href="{{route('country.index')}}">@lang('layouts.admin.aHome')</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST"> 
                        <a role="button" class="nav-link active" 
                        onclick="document.getElementById('logout').submit();">@lang('layouts.admin.aLogout')</a> 
                        @csrf 
                    </form> 
                </div>
            </div>
        </div>
    </div>
</nav>
@yield('secondary-nav')
<!-- header -->
<div class="container my-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/6f83f56a7b.js" crossorigin="anonymous"></script>
</body>
</html>