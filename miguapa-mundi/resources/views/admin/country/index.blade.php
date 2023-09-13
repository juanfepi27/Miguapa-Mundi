@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['countries'] as $country)
    <div class="card">
        <h5 class="card-header bg-secondary">Country #{{$country->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">Name: {{$country->getName()}}</p>
            <p class="my-0 pb-1">Nickname: {{$country->getNickName()}}</p>
            <p class="my-0 pb-1">Owner: {{$country->getUserOwner()->getUsername()}}</p>
            <p class="my-0 pb-1">Color: {{$country->getColor()}}</p>
            <p class="my-0 pb-1 d-inline-block">In offer:</p>
                @if ($country->getInOffer())
                    <p class="d-inline-block"> Yes</p>
                @else
                    <p class="d-inline-block"> No</p>
                @endif
            <p class="my-0 pb-1">Default offer value: {{$country->getDefaultOfferValue()}}</p>
            <p class="my-0 pb-1">Minimum offer value: {{$country->getMinimumOfferValue()}}</p>
            <p class="my-0 pb-1">Attractive value: {{$country->getAttractiveValue()}}</p>
            <p class="my-0 pb-1">Created at: {{$country->getCreatedAt()}}</p>
            <div class="bottom-0 my-2">
                <a href="{{route ('admin.country.show',['id'=> $country->getId()])}}" class="inline-blk btn btn-primary">Update</a>
                <form action="{{ route('admin.country.delete') }}" method="post" class="inline-blk">
                    @csrf
                    <input type="hidden" name="id" value="{{ $country->getId() }}">
                    <input type="submit" class="btn btn-secondary" value="Delete">
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection