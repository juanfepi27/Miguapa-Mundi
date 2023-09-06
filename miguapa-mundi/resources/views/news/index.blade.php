@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="row mt-5">
    <form method="GET" action="{{ route('news.search') }}">
        <div class="col-md-5 mx-auto">
            <div>Write the name of a country or a title</div>
            <div class="input-group">
                <input class="form-control" name="search-bar" type="search">
                <button class="btn bg-white border ms-n5" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container container-1000px text-center">
    <div class="card mt-3">
        @foreach($viewData['news'] as $news)
        <a href="{{ route('news.show', ['id' => $news->getId()]) }}">  
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{ $news->getTitle() }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $news->getDescription() }}</p>
                </div>
            </div>
        </a>
        @endforeach
        <div class="justify-content-center d-flex">
            {{ $viewData['news']->links() }}
        </div>
    </div>
</div>
@endsection