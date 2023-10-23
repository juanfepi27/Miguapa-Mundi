
<!-- Author: Maria Paula Ayala -->

@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-12">
                <h2 class="card-header bg-secondary"><strong>@lang('admin.countryShow.h2Title') #{{ $viewData['country']->getId() }}</strong></h2>
                <div class="card-body">
                    <form action="{{ route('admin.country.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <p class="card-text">
                            <span class="fw-bold">@lang('admin.countryShow.cardCreatedAt'):</span> {{ $viewData['country']->getCreatedAt() }}
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardName'):</span> {{ $viewData['country']->getName() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" name="name" value="{{ old('name', $viewData['country']->getName() ) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardNickName'):</span> {{ $viewData['country']->getNickName() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" class="form-control mb-2" name="nick_name" value="{{ old('nick_name', $viewData['country']->getNickName() ) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardOwner'):</span> {{ $viewData['country']->getUserOwner()->getUsername() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <select name="user_owner_id" class="form-select mb-2" value="{{ old('user_owner_id', $viewData['country']->getUserOwnerId() ) }}">
                                        @foreach ($viewData["users"] as $user)
                                            <option value={{$user->getId()}}>{{ $user->getUsername() }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardColor'):</span> {{ $viewData['country']->getColor() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="color" class="form-control form-control-lg mb-2" name="color" value="{{ old('color', $viewData['country']->getColor() ) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <p class="card-text fw-bold">@lang('admin.countryShow.cardFlag'):</p>
                                    <img class="country-show-flag" src="{{ asset('storage/' . $viewData['country']->getFlag()) }}" alt="@lang('admin.countryShow.altImage')">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="file" class="form-control-file mb-2"  name="flag" value="{{ old('flag', $viewData['country']->getFlag()) }}" />                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12 fw-bold">
                                    @lang('admin.countryShow.cardOffer')
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input class="form-check-input" type="checkbox" id="in_offer" name="in_offer" {{ $viewData['country']->getInOffer() ? 'checked' : '' }}>
                                    <label class="form-check-label" for="in_offer">@lang('admin.countryShow.labelOffer')</label>                                
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardDefaultOfferValue'):</span> ${{ $viewData['country']->getDefaultOfferValueFormatted() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" name="default_offer_value" value="{{ old('default_offer_value', $viewData['country']->getDefaultOfferValue()) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardMinimumOfferValue'):</span> ${{ $viewData['country']->getMinimumOfferValueFormatted() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" name="minimum_offer_value" value="{{ old('minimum_offer_value', $viewData['country']->getMinimumOfferValue()) }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <span class="fw-bold">@lang('admin.countryShow.cardAttractiveValue'):</span> {{ $viewData['country']->getAttractiveValue() }}
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="number" class="form-control mb-2" name="attractive_value" value="{{ old('attractive_value', $viewData['country']->getAttractiveValue()) }}" />
                                </div>
                            </div>
                        </p>
                        <input type="hidden" name="id" value="{{ $viewData['country']->getId() }}">
                        <input type="submit" class="btn btn-primary" value="@lang('admin.countryShow.btnUpdate')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection