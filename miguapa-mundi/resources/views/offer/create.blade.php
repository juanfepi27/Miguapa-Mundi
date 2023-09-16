@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.partials.navbar')
@endsection
@section('content')
<div class="card">
        <h5 class="card-header bg-secondary">@lang('offer.new.cardTitle')</h5>
        <div class="card-body">
            <form action="{{route ('offer.save')}}" method="post">
                @csrf
                <label for="country_id" class="form-label">@lang('offer.new.labelCountry')</label>
                <div class="form-text">@lang('offer.new.helpCountry'):</div>
                <select class="form-select" aria-label="Select country" id="country_id" name="country_id" required>
                    <option selected></option>
                    @foreach ($viewData["countries"] as $country)
                    <option value="{{$country->getId()}}">{{ $country->getName() }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="price" class="form-label">@lang('offer.new.labelValue')</label>
                    <div class="form-text">- @lang('offer.new.helpValue1')</div>
                    <div class="form-text">- @lang('offer.new.helpValue2')</div>
                    <input type="number" class="form-control" id="price" name="price" aria-describedby="offer value" required min="0" max="{{ request()->user()->getBudget() }}">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">@lang('offer.new.btnSubmit')</button>
                </div>
            </form>
        </div>
    </div>
@endsection