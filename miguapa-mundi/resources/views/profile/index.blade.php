
<!-- Author: Juan Felipe Pinzón -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container w-75">
    <div class="card mt-3">
        <div class="card-header text-center bg-secondary">
            <h5 class="card-title">@lang('profile.index.cardTitle')</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>@lang('profile.index.formName'): </strong>{{ $viewData['user']->getName() }}</p>
            <p class="card-text"><strong>@lang('profile.index.formUsername'): </strong>{{ $viewData['user']->getUsername() }}</p>
            <p class="card-text"><strong>@lang('profile.index.formEmail'): </strong>{{ $viewData['user']->getEmail() }}</p>
            <p class="card-text"><strong>@lang('profile.index.formNationality'): </strong>{{ $viewData['user']->getNationality() }}</p>
            <p class="card-text"><strong>@lang('profile.index.formBudget'): </strong>$ {{ $viewData['user']->getBudgetFormatted() }}</p>
            <p class="card-text fw-bold">@lang('profile.index.formCountries'):</p>
            <ul class="list-group list-group-flush">
                @foreach ($viewData['user']->getBoughtCountries() as $country)
                    <li class="list-group-item"><i class="fa fa-arrow-right"></i>   {{ $country->getName() }} </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-evenly gap-3">
                <a href="{{ route('profile.addBudget') }}" class="btn btn-primary">@lang('profile.index.btnAdd')</a>
                <a href="{{ route('password.request') }}" class="btn btn-secondary">@lang('profile.index.btnChange')</a>
            </div>
        </div>
    </div>
</div>
@endsection