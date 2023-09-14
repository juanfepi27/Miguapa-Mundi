@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('alliance.partials.navbar')
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center gap-3 flex-wrap">
        @foreach($viewData['alliances'] as $alliance)
            <div class="col-md-8 col-lg-3 mb-2 w-45 justify-content-center">
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title text-center"><strong>{{ $alliance->getName() }}</strong></h5>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">@lang('alliance.index.cardFounder'): 
                                    @foreach ( $alliance->getMembers() as $member )
                                        @if ($member->getFounder())
                                            {{ $member->getCountry()->getName() }}
                                        @endif
                                    @endforeach
                                    </p>
                                    <p class="card-text">@lang('alliance.index.cardModerators'): </p>
                                    <ul>
                                        @foreach ( $alliance->getMembers() as $member )
                                            @if ($member->getModerator())
                                                <li>{{ $member->getCountry()->getName() }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <p class="card-text">@lang('alliance.index.cardFoundationDate'): {{ $alliance->getCreatedAt() }}</p>
                                    <br>
                                    <p class="card-text">@lang('alliance.index.cardMemebers'): </p>
                                    <ul>
                                        @foreach ( $alliance->getMembers() as $member )
                                            @if ($member->getIsAccepted())
                                                @if ($loop->iteration <= 4)
                                                    <li>{{ $member->getCountry()->getName() }}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($alliance->getMembers()->count() > 4)
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal">
                                        @lang('alliance.index.btnSeeMoreMemebers')
                                    </button>
                                    <br>
                                    <br>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 row align-content-center">
                                <img src="{{ asset('storage/' . $alliance->getImage()) }}" alt="@lang('alliance.index.altImage')">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary card-footer position-absolute start-0 bottom-0 w-100 bg-info1 text-center text-white" data-bs-toggle="modal" data-bs-target="#modalBecomeMember">
                                @lang('alliance.index.btnBecomeMemeber')
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal see more members-->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">@lang('alliance.index.modalTitleSeeMembers')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach ( $alliance->getMembers() as $member )
                                    @if ($member->getIsAccepted())
                                        <li>{{ $member->getCountry()->getName() }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal become member-->
            <div class="modal fade" id="modalBecomeMember" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">@lang('alliance.index.modalTitleBecomeMember')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="text-center" action="{{ route('member.save') }}" method="POST">
                                @csrf
                                <label for="country_id">@lang('alliance.index.modalBody')</label>
                                <select name="country_id" class="form-select mb-2" value="{{ old('country_id') }}">
                                    @foreach ($viewData["userCountries"] as $country)
                                        <option value={{$country->getId()}}>{{ $country->getName() }}</option>
                                    @endforeach
                                </select>
                                

                                <input type="hidden" name="alliance_id" value="{{$alliance->getId()}}">
                                <input type="hidden" name="founder" value="0">
                                <input type="hidden" name="moderator" value="0">
                                <button type="submit" class="btn btn-primary bg-info1 text-center text-white">@lang('alliance.index.modalBtnSendRequest')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

@endsection