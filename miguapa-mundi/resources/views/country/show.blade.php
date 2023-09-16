@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('country.partials.navbar')
@endsection
@section('content')
<div class="d-flex flex-wrap justify-content-arround gap-4">
    <div class="card mt-3 limit-card">
        <div class="card-body position-relative">
            <img class="country-show-flag" src="{{ asset('storage/' . $viewData["country"]->getFlag()) }}" alt="country-flag">
            <p class="card-text fw-bold text-end my-0" style="color: '{{$viewData["country"]->getColor()}}';">{{$viewData["country"]->getName()}}</p>
            <p class="card-text fst-italic text-end mb-2">{{$viewData["country"]->getNickName()}}</p>
            <p class="card-text text-end clearfix my-0"><span class="fw-bold">Owner:</span> {{$viewData["country"]->getUserOwner()->getName()}}</p>
            <p class="card-text my-0"><span class="fw-bold"> Minimum offer value:</span> $ {{$viewData["country"]->getMinimumOfferValueFormatted()}} </p>
            <p class="card-text my-0"><span class="fw-bold"> Attractive value:</span> {{$viewData["country"]->getAttractiveValue()}}</p>
            <div class="float-start">
                <p class="card-text fw-bold my-0">Alliances:</p>
                @if(count($viewData['alliances']) > 0)
                    @foreach($viewData['alliances'] as $alliance)
                    <p class="my-0"><i class="fa fa-arrow-right"></i> {{$alliance}}</p>
                    @endforeach
                @else
                    <p>No alliances yet</p>
                @endif
            </div>
            <div class="card m-1 w-50 float-end small-text">
                <div class="card-header bg-info2 text-white my-0">
                    Last New!
                </div>
                <div class="card-body text-center">
                    @if($viewData['lastNews'])
                    <p class="card-title my-0">{{$viewData['lastNews']->getTitle()}}</p>
                    <p class="card-text fst-italic my-0">{{$viewData['lastNews']->getCreatedAt()}}</p>
                    <a href="{{route('news.search',['search-bar'=> $viewData['country']->getName() ]) }}" class="btn btn-primary my-1 small-text">SHOW MORE</a>
                    @else
                    <p class="card-title my-0">No news yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3 row limit-card">
        <div class="d-flex mt-2 justify-content-center gap-2 flex-wrap">
            <a href="{{route('country.inOfferShow',['id'=>$viewData['country']->getId(),'orderBy'=>'price'])}}" class="btn btn-primary">Order by amount</a>
            <a href="{{route('country.inOfferShow',['id'=>$viewData['country']->getId(),'orderBy'=>'created_at'])}}" class="btn btn-primary">Order by date</a>
            <a href="{{route('offer.create')}}" class="btn btn-primary">Send Offer</a>
        </div>
        <div class="d-flex flex-wrap my-2 gap-1 justify-content-between ">
            @foreach($viewData['offers'] as $offer)
            <div class="card country-offer-card">
                <div class="card-header bg-info2 text-white">
                    offer #{{$offer->getId()}}
                </div>
                <div class="card-body">
                    <p class="card-text my-0 text-center fw-bold">Publish Date:</p>
                    <p class="card-text my-0 text-center">{{$offer->getCreatedAt()}}</p>
                    <p class="card-text my-0"><span class="fw-bold">By:</span>{{$offer->getUserOfferor()->getName()}}</p>
                    <p class="card-text my-0">$ {{$offer->getPriceFormatted()}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection