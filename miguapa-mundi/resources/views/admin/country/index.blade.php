@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    Hola Mapa c:
</div>
@endsection