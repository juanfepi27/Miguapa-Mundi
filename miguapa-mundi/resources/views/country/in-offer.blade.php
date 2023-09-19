
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
                        <img class="card-img-top" src="{{ asset('storage/' . $country->getFlag()) }}" alt="@lang('country.inOfferIndex.altImage')">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: {{ $country->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $country->getName() }}</h5>
                            <p class="card-text text-center"><em>{{ $country->getNickName() }}</em></p>
                            <br>
                            <p class="card-text">@lang('country.inOfferIndex.cardOwner'): {{ $country->getUserOwner()->getUsername() }}</p>
                            <p class="card-text">@lang('country.inOfferIndex.cardAttractiveValue'): {{ $country->getAttractiveValue() }}</p>
                            <br>
                            <p class="card-text">@lang('country.inOfferIndex.cardMinimumOfferValue'): ${{ $country->getMinimumOfferValueFormatted() }}</p>
                            @if($country->maxOffer !== '0')
                                <p class="card-text">@lang('country.inOfferIndex.cardBestOffer'): ${{ $country->maxOffer }}</p>
                            @else
                                <p class="card-text">@lang('country.inOfferIndex.cardNoOffer')</p>
                            @endif
                        </div>
                        <br>
                        <div class="card-footer">
                            <a href="{{ route('country.inOfferShow', ['id' => $country->getId()] ) }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white">
                                @lang('country.inOfferIndex.aShowMore')
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection