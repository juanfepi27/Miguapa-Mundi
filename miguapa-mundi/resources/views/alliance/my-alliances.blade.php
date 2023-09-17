@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('alliance.partials.navbar')
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center gap-3 flex-wrap">
        @foreach($viewData["alliances_members"] as $countryName => $members)
            @foreach($members as $member)
                <div class="col-md-8 col-lg-3 mb-2 w-45 justify-content-center">
                    <div class="card mt-3">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h5 class="card-title text-center"><strong>{{$member->getAlliance()->getName()}} - {{ $countryName }}</strong></h5>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text">@lang('alliance.myAlliances.cardFounder'): 
                                            @foreach ( $member->getAlliance()->getMembers() as $memberAlliance )
                                                @if ($memberAlliance->getFounder())
                                                    {{ $memberAlliance->getCountry()->getName() }}
                                                @endif
                                            @endforeach
                                        </p>
                                        <p class="card-text">@lang('alliance.myAlliances.cardModerators'): </p>
                                        <ul>
                                            @foreach ( $member->getAlliance()->getMembers() as $memberAlliance )
                                                @if ($memberAlliance->getModerator())
                                                    <li>{{ $memberAlliance->getCountry()->getName() }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <p class="card-text">@lang('alliance.myAlliances.cardFoundationDate'): {{ $member->getAlliance()->getCreatedAt() }}</p>
                                        <br>
                                        <p class="card-text">@lang('alliance.myAlliances.cardMembers'): </p>
                                        <ul>
                                            @foreach ( $member->getAlliance()->getMembers() as $memberAlliance )
                                                @if ($memberAlliance->getIsAccepted())
                                                    @if ($loop->iteration < 4)
                                                        <li>{{ $memberAlliance->getCountry()->getName() }}</li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                        @if ($member->getAlliance()->getMembers()->where('is_accepted',1)->count() >= 3)
                                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modal-{{ $member->getAlliance()->getId() }}">
                                                @lang('alliance.myAlliances.btnSeeMoreMembers')
                                            </button>
                                        @endif
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4 row align-content-center">
                                    <img src="{{ asset('storage/' . $member->getAlliance()->getImage()) }}" alt="@lang('alliance.myAlliances.altImage')">
                                </div>
                            </div>
                            <div class="card-footer">
                                @if ($member->getIsAccepted() === null)
                                    <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder">
                                        @lang('alliance.myAlliances.footWaiting')
                                    </div>
                                @elseif ($member->getIsAccepted())
                                    @if ($member->getModerator())
                                        <a href="{{ route('alliance.show', ['id' => $member->getAllianceId()]) }}" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder btn btn-normal">@lang('alliance.myAlliances.aSeeDetails')</a>
                                    @else
                                        <form class="text-center" action="{{ route('member.delete', ['id' => $member->getId()]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder">@lang('alliance.myAlliances.btnGetOut')</button>
                                        </form>
                                    @endif
                                @else
                                    <div class="card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white fw-bolder">
                                        @lang('alliance.myAlliances.footRejected')
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{ $member->getAlliance()->getId() }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">@lang('alliance.myAlliances.modalTitleSeeMembers')</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @foreach ( $member->getAlliance()->getMembers() as $memberAlliance )
                                            @if ($memberAlliance->getIsAccepted())
                                                <li>{{ $memberAlliance->getCountry()->getName() }}</li>
                                            @endif                                  
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

@endsection