@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('alliance.includes.nav2')
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
                                    <p class="card-text">Founder: 
                                    @foreach ( $alliance->getMembers() as $member )
                                        @if ($member->getFounder())
                                            {{ $member->getCountry()->getName() }}
                                        @endif
                                    @endforeach
                                    </p>
                                    <p class="card-text">Moderators: </p>
                                    <ul>
                                        @foreach ( $alliance->getMembers() as $member )
                                            @if ($member->getModerator())
                                                <li>{{ $member->getCountry()->getName() }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <p class="card-text">Foundation date: {{ $alliance->getCreatedAt() }}</p>
                                    <br>
                                    <p class="card-text">Members: </p>
                                    <ul>
                                        @foreach ( $alliance->getMembers() as $member )
                                            @if ($loop->iteration <= 3)
                                                @if ($member->getIsAccepted())
                                                    <li>{{ $member->getCountry()->getName() }}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($alliance->getMembers()->count() > 3)
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modal">
                                        See more members
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 row align-content-center">
                                <img src="{{ asset('storage/' . $alliance->getImage()) }}" alt="Alliance's image">
                            </div>
                        </div>
                        <div class="card-footer">
                            <form class="text-center" action="{{ route('member.save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="alliance_id" value="{{$alliance->getId()}}">
                                <input type="hidden" name="founder" value="0">
                                <input type="hidden" name="moderator" value="0">
                                <input type="hidden" name="country_id" value="4">
                                <button type="submit" class="btn bg-primary w-100">Become a member</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Members of the alliance</h5>
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

        @endforeach
    </div>
</div>

@endsection