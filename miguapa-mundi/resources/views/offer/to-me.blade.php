@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.partials.navbar')
@endsection
@section('content')
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    <div class="row position-fixed top-50 start-0 translate-middle z-1">
        <p class="bg-info1 m-1 p-1 rounded-pill text-end text-white fw-bold">order by:</p>
        <a href="{{route('offer.toMe',['orderBy'=>'price'])}}" class="btn-primary m-1 p-1 rounded-pill text-end">amount</a>
        <a href="{{route('offer.toMe',['orderBy'=>'created_at'])}}" class="btn-primary m-1 p-1 rounded-pill text-end">date</a>
    </div>
    @foreach($viewData['offers'] as $offer)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary">@lang('offer.toMe.cardTitle') #{{$offer->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">@lang('offer.toMe.cardOfferor'): {{$offer->getUserOferror()->getName()}}</p>
            <p class="my-0 pb-1">@lang('offer.toMe.cardCountry'): {{$offer->getCountry()->getName()}}</p>
            <p class="my-0 pb-1">@lang('offer.toMe.cardValue'): $ {{$offer->getPriceFormatted()}}</p>
            <p class="my-0 pb-1">@lang('offer.toMe.cardDate'): {{$offer->getCreatedAt()}}</p>
            <div class="position-absolute bottom-0 my-2">
                <a href="{{route ('offer.accept',['id'=> $offer->getId()])}}" class="btn btn-primary">@lang('offer.toMe.btnAccept')</a>
                <a href="{{route ('offer.reject',['id'=> $offer->getId()])}}" class="btn btn-secondary">@lang('offer.toMe.btnReject')</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection