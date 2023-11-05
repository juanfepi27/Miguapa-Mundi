
<!-- Author: Juan Felipe Pinzón -->

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
            <livewire:select-country :viewData="$viewData"/>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">@lang('offer.new.btnSubmit')</button>
            </div>
        </form>
    </div>
</div>
@endsection