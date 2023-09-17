@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary"><strong>@lang('admin.countryCreate.cardTitle')</strong></div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.country.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelName')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderName')" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nick_name" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelNickName')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderNickName')" name="nick_name" value="{{ old('nick_name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="user_owner_id" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelOwner')</label>
                                <div class="col-sm-8">
                                    <select name="user_owner_id" class="form-select mb-2" value="{{ old('user_owner_id') }}">
                                        @foreach ($viewData["users"] as $user)
                                            <option value={{$user->getId()}}>{{ $user->getUsername() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelColor')</label>
                                <div class="col-sm-8">
                                    <input type="color" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderColor')" name="color" value="{{ old('color') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="flag" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelFlag')</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file mb-2"  name="flag" value="{{ old('flag') }}" />
                                    <div id="flagHelp" class="form-text">@lang('admin.countryCreate.helpFlag')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4">@lang('admin.countryCreate.offer')</div>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="in_offer" name="in_offer">
                                        <label class="form-check-label" for="in_offer">@lang('admin.countryCreate.labelOffer')</label>
                                        <div id="in_offerHelp" class="form-text">@lang('admin.countryCreate.helpOffer')</div>
                                    </div>
                                </div>                           
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="default_offer_value" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelDefault')</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderDefault')" name="default_offer_value" value="{{ old('default_offer_value') }}" />
                                    <div id="defHelp" class="form-text">@lang('admin.countryCreate.helpPrice')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="minimum_offer_value" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelMinimum')</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderMinimum')" name="minimum_offer_value" value="{{ old('minimum_offer_value') }}" />
                                    <div id="minimum_offer_valueHelp" class="form-text">@lang('admin.countryCreate.helpPrice')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="attractive_value" class="col-sm-4 col-form-label">@lang('admin.countryCreate.labelAttractive')</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="@lang('admin.countryCreate.placeHolderAttractive')" name="attractive_value" value="{{ old('attractive_value') }}" />
                                    <div id="attValHelp" class="form-text">@lang('admin.countryCreate.helpAttractive')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 text-center">
                                    <input type="submit" class="btn btn-primary" value="@lang('admin.countryCreate.btnCreate')" />
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