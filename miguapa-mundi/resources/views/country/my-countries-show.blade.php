
<!-- Author: Maria Paula Ayala -->

@extends('layouts.app')
@section('title',$viewData['titleTemplate'])
@section('secondary-nav')
    @include('country.partials.navbar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary"><strong>{{$viewData['country']->getName()}}</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('country.myCountriesUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nick_name" class="col-sm-4 col-form-label">@lang('country.myCountriesShow.labelNickName')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" name="nick_name" value="{{ old('nick_name', $viewData['country']->getNickName() ) }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="color" class="col-sm-4 col-form-label">@lang('country.myCountriesShow.labelColor')</label>
                                <div class="col-sm-8">
                                    <input type="color" class="form-control form-control-lg mb-2" name="color" value="{{ old('color', $viewData['country']->getColor()) }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="flag" class="col-form-label">@lang('country.myCountriesShow.labelFlag')</label>
                                    <img class="country-show-flag" src="{{ asset('storage/' . $viewData['country']->getFlag()) }}" alt="Country's flag">
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file mb-2"  name="flag" value="{{ old('flag', $viewData['country']->getFlag()) }}" />
                                    <div id="flagHelp" class="form-text">@lang('country.myCountriesShow.helpFlag')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4">@lang('country.myCountriesShow.offer')</div>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="in_offer" name="in_offer" {{ $viewData['country']->getInOffer() ? 'checked' : '' }}>
                                        <label class="form-check-label" for="in_offer">@lang('country.myCountriesShow.labelOffer')</label>
                                        <div id="in_offerHelp" class="form-text">@lang('country.myCountriesShow.helpOffer')</div>
                                    </div>
                                </div>                           
                            </div>
                            <br>
                            <input type="hidden" name="id" value="{{ $viewData['country']->getId() }}">
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 text-center">
                                    <input type="submit" class="btn btn-primary" value="@lang('country.myCountriesShow.btnUpdate')" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection