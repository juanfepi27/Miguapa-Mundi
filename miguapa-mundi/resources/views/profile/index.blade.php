@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container w-75">
    <div class="card mt-3">
        <div class="card-header text-center bg-secondary">
            <h5 class="card-title">MY PROFILE</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Name: </strong>{{ $viewData['user']->getName() }}</p>
            <p class="card-text"><strong>Username: </strong>{{ $viewData['user']->getUsername() }}</p>
            <p class="card-text"><strong>Email: </strong>{{ $viewData['user']->getEmail() }}</p>
            <p class="card-text"><strong>Nationality: </strong>{{ $viewData['user']->getNationality() }}</p>
            <p class="card-text"><strong>Budget: </strong>$ {{ $viewData['user']->getBudgetFormatted() }}</p>
            <p class="card-text fw-bold">My countries:</p>
            <ul class="list-group list-group-flush">
                @foreach ($viewData['user']->getBoughtCountries() as $country)
                    <li class="list-group-item"><i class="fa fa-arrow-right"></i>   {{ $country->getName() }} </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-evenly gap-3">
                <a href="{{ route('profile.addBudget') }}" class="btn btn-primary">Add budget</a>
                <a href="#" class="btn btn-secondary">Change password</a>
            </div>
        </div>
    </div>
</div>
@endsection