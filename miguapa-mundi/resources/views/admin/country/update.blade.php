@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="text-center">
    Welcome to the miguapa mundi admin country update
</div>
@endsection