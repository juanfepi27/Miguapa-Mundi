
<!-- Author: Maria Paula Ayala -->

@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('secondary-nav')
    @include('alliance.partials.navbar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary"><strong>@lang('alliance.create.cardTitle')</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('alliance.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">@lang('alliance.create.labelName')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="@lang('alliance.create.placeHolderName')" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="country_id" class="col-sm-4 col-form-label">@lang('alliance.create.labelFounder')</label>
                                <div class="col-sm-8">
                                    <select name="country_id" class="form-select mb-2" value="{{ old('country_id') }}">
                                        @foreach ($viewData["userCountries"] as $country)
                                            <option value={{$country->getId()}}>{{ $country->getName() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="founder" value="1">
                                <input type="hidden" name="moderator" value="1">
                                <input type="hidden" name="is_accepted" value="1">
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label">@lang('alliance.create.labelImage')</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file mb-2"  name="image" value="{{ old('image') }}" />
                                    <div id="imageHelp" class="form-text">@lang('alliance.create.helpImage')</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 text-center">
                                    <input type="submit" class="btn btn-primary" value="@lang('alliance.create.btnCreate')" />
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