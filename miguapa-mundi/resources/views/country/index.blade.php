@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
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
                            @if ( $country->getMembers()->isNotEmpty() )
                            <p class="card-text">@lang('country.index.cardAlliances'):</p>
                            <ul>
                                @foreach ( $country->getMembers() as $member )
                                    @if ($member->getIsAccepted())
                                        <li>{{ $member->getAlliance()->getName() }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
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