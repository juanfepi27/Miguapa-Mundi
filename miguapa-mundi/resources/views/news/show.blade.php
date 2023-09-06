@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container container-1000px">
    <div class="card mt-3">
        <div class="card-header text-center">
            <h5 class="card-title">{{ $viewData['news']->getTitle() }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $viewData['news']->getCreatedAt() }}</p>
            <p class="card-text">{{ $viewData['news']->getDescription() }}</p>
            <p class="card-text fw-bold">Countries involved: </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Country </li>
                <li class="list-group-item">Country </li>
            </ul>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('news.index') }}" class="btn btn-primary">Back to news</a>
    </div>
</div>
@endsection