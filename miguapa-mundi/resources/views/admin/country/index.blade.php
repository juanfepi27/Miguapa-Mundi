@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['countries'] as $country)
    <div class="card">
        <h5 class="card-header bg-secondary">@lang('admin.countryIndex.cardTitle') #{{$country->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardName'): {{$country->getName()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardNickName'): {{$country->getNickName()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardOwner'): {{$country->getUserOwner()->getUsername()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardColor'): {{$country->getColor()}}</p>
            <p class="my-0 pb-1 d-inline-block">@lang('admin.countryIndex.cardOffer'):</p>
                @if ($country->getInOffer())
                    <p class="d-inline-block"> @lang('admin.countryIndex.cardIsInOffer')</p>
                @else
                    <p class="d-inline-block"> @lang('admin.countryIndex.cardIsNotInOffer')</p>
                @endif
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardDefaultOfferValue'): {{$country->getDefaultOfferValueFormatted()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardMinimumOfferValue'): {{$country->getMinimumOfferValueFormatted()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardAttractiveValue'): {{$country->getAttractiveValue()}}</p>
            <p class="my-0 pb-1">@lang('admin.countryIndex.cardCreatedAt'): {{$country->getCreatedAt()}}</p>
            <div class="bottom-0 my-2">
                <a href="{{route ('admin.country.show',['id'=> $country->getId()])}}" class="inline-blk btn btn-primary">@lang('admin.countryIndex.aUpdate')</a>
                <form action="{{ route('admin.country.delete') }}" method="post" class="inline-blk">
                    @csrf
                    <input type="hidden" name="id" value="{{ $country->getId() }}">
                    <input type="submit" class="btn btn-secondary" value="@lang('admin.countryIndex.btnDelete')">
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection