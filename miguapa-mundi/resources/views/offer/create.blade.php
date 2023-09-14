@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('offer.partials.navbar')
@endsection
@section('content')
<div class="card">
        <h5 class="card-header bg-secondary">New Offer</h5>
        <div class="card-body">
            <form action="{{route ('offer.save')}}" method="post">
                @csrf
                <label for="country_id" class="form-label">Country</label>
                <div class="form-text">Select the country you want to offer for:</div>
                <select class="form-select" aria-label="Select country" id="country_id" name="country_id" required>
                    <option selected></option>
                    @foreach ($viewData["countries"] as $country)
                    <option value="{{$country->getId()}}">{{ $country->getName() }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="price" class="form-label">Value to offer</label>
                    <div class="form-text">- Remember that you may offer a value greater that the minimum offer value of the country to be a valid offer</div>
                    <div class="form-text">- Remember that you have to add a value without dots or commas (for example: $1.000.000 must be 1000000)</div>
                    <input type="number" class="form-control" id="price" name="price" aria-describedby="offer value" required min="0" max="{{ request()->user()->getBudget() }}">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection