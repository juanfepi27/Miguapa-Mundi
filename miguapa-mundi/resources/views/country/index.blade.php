
<!-- Author: Maria Paula Ayala -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="row">
    <div class="col-lg-9 col-12" style="background-color: green;">
        BARRA DE NOTICIAS
    </div>
    <div class="col-lg-3 col-12 mb-2">
        <form method="GET" action="{{ route('country.search') }}">
            <div class="input-group">
                <input class="form-control" name="search-bar" type="search" placeholder="@lang('country.index.searchBar')">
                <button class="btn bg-white border ms-n5" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- Country info view for telephone -->
        @if($viewData['searchCountry'])
        <div class="d-block d-lg-none col-12">
            <div class="card bg-light">
                <img class="card-img-top" src="{{ asset('storage/' . $viewData['searchCountry']->getFlag()) }}" alt="@lang('country.index.altImage')">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: {{ $viewData['searchCountry']->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $viewData['searchCountry']->getName() }}</h5>
                    <p class="card-text text-center"><em>{{ $viewData['searchCountry']->getNickName() }}</em></p>
                    <br>
                    <p class="card-text">@lang('country.index.cardOwner'): {{ $viewData['searchCountry']->getUserOwner()->getUsername() }}</p>
                    <p class="card-text">@lang('country.index.cardMinimumOfferValue'): ${{ $viewData['searchCountry']->getMinimumOfferValueFormatted() }}</p>
                    <p class="card-text">@lang('country.index.cardAttractiveValue'): {{ $viewData['searchCountry']->getAttractiveValue() }} </p>
                    @if ($viewData['searchCountry']->getInOffer())
                        <p>@lang('country.index.cardIsInOffer')</p>
                    @else
                        <p>@lang('country.index.cardIsNotInOffer')</p>
                    @endif
                    @foreach ( $viewData['searchCountry']->getMembers() as $member )
                        @if ($member->getIsAccepted())
                            @if ($loop->iteration == 1)
                                <p class="card-text">@lang('country.index.cardAlliances'):</p>
                            @endif
                            <ul>
                                <li>{{ $member->getAlliance()->getName() }}</li>
                            </ul>
                        @endif
                    @endforeach
                    @guest
                    @else
                    <br>
                    <div class="card-footer">
                        <a href="{{ route('offer.create') }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white">
                            @lang('country.index.aSendOffer')
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
        @endif

    <div id="map" class="col-12 position-relative" style="height: 800px; background-color: aqua;">
        <!-- Country info view for computer -->
        @if($viewData['searchCountry'])
        <div class="country-card d-none d-lg-block col-lg-3 position-absolute top-50 end-0 translate-middle-y overflow-auto">
            <div class="card bg-light">
                <img class="card-img-top" src="{{ asset('storage/' . $viewData['searchCountry']->getFlag()) }}" alt="@lang('country.index.altImage')">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: {{ $viewData['searchCountry']->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $viewData['searchCountry']->getName() }}</h5>
                    <p class="card-text text-center"><em>{{ $viewData['searchCountry']->getNickName() }}</em></p>
                    <br>
                    <p class="card-text">@lang('country.index.cardOwner'): {{ $viewData['searchCountry']->getUserOwner()->getUsername() }}</p>
                    <p class="card-text">@lang('country.index.cardMinimumOfferValue'): ${{ $viewData['searchCountry']->getMinimumOfferValueFormatted() }}</p>
                    <p class="card-text">@lang('country.index.cardAttractiveValue'): {{ $viewData['searchCountry']->getAttractiveValue() }} </p>
                    @if ($viewData['searchCountry']->getInOffer())
                        <p>@lang('country.index.cardIsInOffer')</p>
                    @else
                        <p>@lang('country.index.cardIsNotInOffer')</p>
                    @endif
                    @foreach ( $viewData['searchCountry']->getMembers() as $member )
                        @if ($member->getIsAccepted())
                            @if ($loop->iteration == 1)
                                <p class="card-text">@lang('country.index.cardAlliances'):</p>
                            @endif
                            <ul>
                                <li>{{ $member->getAlliance()->getName() }}</li>
                            </ul>
                        @endif
                    @endforeach
                    @guest
                    @else
                    <br>
                    <div class="card-footer">
                        <a href="{{ route('offer.create') }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white">
                            @lang('country.index.aSendOffer')
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
        
<div class="container container-1000px">
    <div class="row">
        @foreach($viewData['countries'] as $country)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $country->getFlag()) }}" alt="@lang('country.index.altImage')">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="color: {{ $country->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $country->getName() }}</h5>
                            <p class="card-text text-center"><em>{{ $country->getNickName() }}</em></p>
                            <br>
                            <p class="card-text">@lang('country.index.cardOwner'): {{ $country->getUserOwner()->getUsername() }}</p>
                            <p class="card-text">@lang('country.index.cardMinimumOfferValue'): ${{ $country->getMinimumOfferValueFormatted() }}</p>
                            <p class="card-text">@lang('country.index.cardAttractiveValue'): {{ $country->getAttractiveValue() }}</p>
                            @if ($country->getInOffer())
                                <p>@lang('country.index.cardIsInOffer')</p>
                            @else
                                <p>@lang('country.index.cardIsNotInOffer')</p>
                            @endif
                            @foreach ( $country->getMembers() as $member )
                                @if ($member->getIsAccepted())
                                    @if ($loop->iteration == 1)
                                        <p class="card-text">@lang('country.index.cardAlliances'):</p>
                                    @endif
                                    <ul>
                                        <li>{{ $member->getAlliance()->getName() }}</li>
                                    </ul>
                                @endif
                            @endforeach
                            @guest
                            @else
                            <br>
                            <div class="card-footer">
                                <a href="{{ route('offer.create') }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white">
                                    @lang('country.index.aSendOffer')
                                </a> 
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection