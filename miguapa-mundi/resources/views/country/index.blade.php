@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container container-1000px">
    <div class="row">
        @foreach($viewData['countries'] as $country)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card mt-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $country->getFlag()) }}" alt="Country's flag">
                        <div class="card-body">
                            @guest
                            <h5 class="card-title text-center" style="color: #{{ $country->getColor() }}; text-shadow: 1px 1px 2px black;">{{ $country->getName() }}</h5>
                            <p class="card-text text-center"><em>{{ $country->getNickName() }}</em></p>
                            <br>
                            {{-- <p class="card-text">Owner: {{ $country->getUserOwner()->getName() }}</p> --}}
                            <p class="card-text">Minimum offer value: ${{ $country->getMinimumOfferValue() }}</p>
                            <p class="card-text">Attractive value: {{ $country->getAttractiveValue() }}</p>
                            @if ($country->getInOffer())
                                <p>The country <strong>is</strong> in offer</p>
                            @else
                                <p>The country <strong>isn't</strong> in offer</p>
                            @endif
                            @if ( $country->getMembers()->isNotEmpty() )
                            <p class="card-text">Alliances:</p>
                            <ul>
                                @foreach ( $country->getMembers() as $member )
                                    <li>{{ $member->getAlliance()->getName() }}</li>
                                @endforeach
                            </ul>
                            @endif
                            @else
                            <form class="text-center" action="#" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Send offer</button>
                            </form>
                           @endguest
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection