@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div>
    <h2>Update Country</h2>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Country #{{ $viewData['country']->getId() }}</h5>
                    </div>
                    <form action="{{ route('admin.country.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <p class="card-text">
                        Created at: {{ $viewData['country']->getCreatedAt() }}
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual name: {{ $viewData['country']->getName() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="Enter the name" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual nickname: {{ $viewData['country']->getNickName() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" placeholder="Enter nickname" name="nick_name" value="{{ old('nick_name') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual owner: {{ $viewData['country']->getUserOwner()->getUsername() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <select name="user_owner_id" class="form-select mb-2" value="{{ old('user_owner_id') }}">
                                        @foreach ($viewData["users"] as $user)
                                            <option value={{$user->getId()}}>{{ $user->getUsername() }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual color: {{ $viewData['country']->getColor() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="color" class="form-control form-control-lg mb-2" placeholder="Color for the country" name="color" value="{{ old('color') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual flag: <img class="img-fluid" src="{{ asset('storage/' . $viewData['country']->getFlag()) }}" alt="Country's flag">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="file" class="form-control-file mb-2"  name="flag" value="{{ old('flag') }}" />                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12 d-inline-block">
                                    Actual status for offer: 
                                    @if ($viewData['country']->getInOffer())
                                        <p class="d-inline-block">Is in offer</p>
                                    @else
                                        <p class="d-inline-block">Isn't in offer</p>
                                    @endif
                                    
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input class="form-check-input" type="checkbox" id="in_offer" name="in_offer">
                                    <label class="form-check-label" for="in_offer">Offer</label>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual default offer value: {{ $viewData['country']->getDefaultOfferValue() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" placeholder="Enter default offer value" name="default_offer_value" value="{{ old('default_offer_value') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual minimum offer value: {{ $viewData['country']->getMinimumOfferValue() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" placeholder="Enter minimum offer value" name="minimum_offer_value" value="{{ old('minimum_offer_value') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    Actual attractive value: {{ $viewData['country']->getAttractiveValue() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" placeholder="Enter attractive value" name="attractive_value" value="{{ old('attractive_value') }}" />
                                </div>
                            </div>
                        </p>
                        <input type="hidden" name="id" value="{{ $viewData['country']->getId() }}">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection