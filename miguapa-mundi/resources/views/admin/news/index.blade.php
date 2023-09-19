
<!-- Author: Miguel Ángel Calvache -->

@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.news.partials.navbar')
@endsection
<div class="container d-flex flex-wrap gap-3 justify-content-evenly">
    @foreach($viewData['news'] as $notice)
    <div class="card w-25">
        <h5 class="card-header bg-secondary">@lang('admin.newsIndex.cardTitle') #{{$notice->getId()}}</h5>
        <div class="card-body">
            <p class="my-0 pb-1">@lang('admin.newsIndex.pTitle'): {{$notice->getTitle()}}</p>
            <p class="my-0 pb-1">@lang('admin.newsIndex.pDescription'): {{$notice->getDescription()}}</p>
            <p class="my-0 pb-1">@lang('admin.newsIndex.pCreatedAt'): {{$notice->getCreatedAt()}}</p>
            <div class="my-2">
                <a href="{{route ('admin.news.show',['id'=> $notice->getId()])}}" class="inline-blk btn btn-primary">@lang('admin.newsIndex.btnUpdate')</a>
                <form action="{{ route('admin.news.delete') }}" method="post" class="inline-blk">
                    @csrf
                    <input type="hidden" name="id" value="{{ $notice->getId() }}">
                    <input type="submit" class="btn btn-secondary" value="@lang('admin.newsIndex.btnDelete')">
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection