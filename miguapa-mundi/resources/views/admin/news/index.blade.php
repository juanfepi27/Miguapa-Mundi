@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.news.partials.navbar')
@endsection
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['news'] as $notice)
    <div class="offer-card card">
        <h5 class="card-header bg-secondary">New #{{$notice->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">Title: {{$notice->getTitle()}}</p>
            <p class="my-0 pb-1">Description: {{$notice->getDescription()}}</p>
            <p class="my-0 pb-1">Created at: {{$notice->getCreatedAt()}}</p>
            <div class="position-absolute bottom-0 my-2">
                <a href="{{route ('admin.news.show',['id'=> $notice->getId()])}}" class="inline-blk btn btn-primary">Update</a>
                <form action="{{ route('admin.news.delete') }}" method="post" class="inline-blk">
                    @csrf
                    <input type="hidden" name="id" value="{{ $notice->getId() }}">
                    <input type="submit" class="btn btn-secondary" value="Delete">
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection