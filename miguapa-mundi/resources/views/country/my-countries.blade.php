
<!-- Author: Maria Paula Ayala -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('country.partials.navbar')
@endsection
@section('content')
<div class="container container-1000px">
    <div class="row">
        @foreach($viewData['countries'] as $country)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $country->getFlag()) }}" alt="@lang('country.myCountriesIndex.altImage')">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: {{ $country->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $country->getName() }}</h5>
                            <p class="card-text text-center"><em>{{ $country->getNickName() }}</em></p>
                            <br>
                            <p class="card-text">@lang('country.myCountriesIndex.cardOwner'): {{ $country->getUserOwner()->getUsername() }}</p>
                            <p class="card-text">@lang('country.myCountriesIndex.cardAttractiveValue'): {{ $country->getAttractiveValue() }}</p>
                            <br>
                            <p class="card-text">@lang('country.myCountriesIndex.cardMinimumOfferValue'): ${{ $country->getMinimumOfferValueFormatted() }}</p>
                            @if($country->getMaxOffer() !== null)
                                <p class="card-text">@lang('country.myCountriesIndex.cardBestOffer'): ${{ $country->getMaxOfferFormatted() }}</p>
                            @else
                                <p class="card-text">@lang('country.myCountriesIndex.cardNoOffer')</p>
                            @endif
                        </div>
                        <br>
                        <div class="card-footer">
                            <a href="{{ route('country.myCountriesShow', ['id' => $country->getId()] ) }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white">
                                @lang('country.myCountriesIndex.aChangeInfo')
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection