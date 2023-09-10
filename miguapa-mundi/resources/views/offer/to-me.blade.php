@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.includes.nav2')
@endsection
@section('content')
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['offers'] as $offer)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary">Offer #{{$offer->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">Offeror: {{$offer->getUserOferror()["name"]}}</p>
            <!-- careful here!... need getters and setters for user -->
            <p class="my-0 pb-1">Country: {{$offer->getCountry()->getName()}}</p>
            <p class="my-0 pb-1">Offered Value: {{$offer->getPrice()}}</p>
            <p class="my-0 pb-1">Sent Date: {{$offer->getCreatedAt()}}</p>
            <div class="position-absolute bottom-0 my-2">
                <a href="{{route ('offer.accept',['id'=> $offer->getId()])}}" class="btn btn-primary">Accept</a>
                <a href="{{route ('offer.reject',['id'=> $offer->getId()])}}" class="btn btn-secondary">Reject</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection