@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('alliance.partials.navbar')
@endsection
@section('content')
<div class="container container-1000px">
    <div class="card">
        <img class="card-img-top mx-auto alliance-show-flag" src="{{ asset('storage/' . $viewData["alliance"]->getImage()) }}" alt="@lang('alliance.show.altImage')">
        <div class="card-body">
            <h2 class="card-title text-center"><strong>{{ $viewData["alliance"]->getName() }}</strong> </h2>
            <br>
            <h5 class="card-text d-inline-block">@lang('alliance.show.cardFounder'):</h5>
            <p class="card-text d-inline-block">
            @foreach ( $viewData["alliance"]->getMembers() as $member )
                @if ($member->getFounder())
                    {{ $member->getCountry()->getName() }}
                @endif
            @endforeach
            </p>
            <h5 class="card-text">@lang('alliance.show.cardModerators'): </h5>
            <ul>
                @foreach ( $viewData["alliance"]->getMembers() as $member )
                    @if ($member->getModerator())
                        <li>{{ $member->getCountry()->getName() }}</li>
                    @endif
                @endforeach
            </ul>
            <br>
            <h5 class="card-text d-inline-block">@lang('alliance.show.cardFoundationDate'):</h5>
            <p class="card-text d-inline-block">{{ $viewData["alliance"]->getCreatedAt() }}</p>
            <br>
            <h5 class="card-text">@lang('alliance.show.cardMembers'): </h5>
            <ul class="list-unstyled">
                @foreach ( $viewData["alliance"]->getMembers() as $member )
                    @if ($member->getIsAccepted())
                        <li class="d-flex gap-3 align-items-baseline">
                            <i class="fa fa-arrow-right"></i>
                            <p>{{ $member->getCountry()->getName() }}</p>
                            @if (!$member->getFounder())
                                @if ($member->getModerator())
                                    <form class="text-center" action="{{ route('member.stopModerator', ['id' => $member->getId()]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary bg-info1 text-center text-white">@lang('alliance.show.btnStopModerator')</button>
                                    </form>
                                @else
                                    <form class="text-center" action="{{ route('member.becomeModerator', ['id' => $member->getId()]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary bg-info1 text-center text-white">@lang('alliance.show.btnMakeModerator')</button>
                                    </form>
                                @endif
                                <form class="text-center" action="{{ route('member.delete', ['id' => $member->getId()]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary bg-info2 text-center text-white">@lang('alliance.show.btnKickAlliance')</button>
                                </form>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
            <h5 class="card-text">@lang('alliance.show.cardRequests'): </h5>
            <ul class="list-unstyled">
                @foreach ( $viewData["alliance"]->getMembers() as $member )
                    @if ($member->getIsAccepted() === null)
                        <li class="d-flex gap-3 align-items-baseline">
                            <i class="fa fa-arrow-right"></i>
                            <p>{{ $member->getCountry()->getName() }} </p> 
                            <form class="text-center" action="{{ route('member.acceptMember', ['id' => $member->getId()]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary bg-info1 text-center text-white">@lang('alliance.show.btnAccept')</button>
                            </form>
                            <form class="text-center" action="{{ route('member.declineMember', ['id' => $member->getId()]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary bg-info2 text-center text-white">@lang('alliance.show.btnDecline')</button>
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
