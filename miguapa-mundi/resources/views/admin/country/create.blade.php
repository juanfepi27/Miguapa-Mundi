@extends('layouts.admin')
@section('title',$viewData['titleTemplate'])
@section('content')
@section('secondary-nav')
    @include('admin.country.partials.navbar')
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary"><strong>Create a new country</strong></div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('admin.country.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name of the country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="Name of the country" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="nick_name" class="col-sm-4 col-form-label">Nickname of the country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="Nickname of the country" name="nick_name" value="{{ old('nick_name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="user_owner_id" class="col-sm-4 col-form-label">Who is the owner of the country?</label>
                                <div class="col-sm-8">
                                    <select name="user_owner_id" class="form-select mb-2" value="{{ old('user_owner_id') }}">
                                        @foreach ($viewData["users"] as $user)
                                            <option value={{$user->getId()}}>{{ $user->getUsername() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-4 col-form-label">Color for the country</label>
                                <div class="col-sm-8">
                                    <input type="color" class="form-control form-control-lg mb-2" placeholder="Color for the country" name="color" value="{{ old('color') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="flag" class="col-sm-4 col-form-label">Flag of the country</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file mb-2"  name="flag" value="{{ old('flag') }}" />
                                    <div id="flagHelp" class="form-text">Attach an image, it can be of the types png, jpg or jpeg.</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-4">Is your country in offer?</div>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="in_offer" name="in_offer">
                                        <label class="form-check-label" for="in_offer">Offer</label>
                                        <div id="in_offerHelp" class="form-text">Check the box ONLY if you want your country to be in offer.</div>
                                    </div>
                                </div>                           
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="default_offer_value" class="col-sm-4 col-form-label">Default offer value for the country</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="Default offer value for the country" name="default_offer_value" value="{{ old('default_offer_value') }}" />
                                    <div id="defHelp" class="form-text">The price is in colombian pesos and it must be greater than 0.</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="minimum_offer_value" class="col-sm-4 col-form-label">Minimum offer value for the country</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="Minimum offer value for the country" name="minimum_offer_value" value="{{ old('minimum_offer_value') }}" />
                                    <div id="minimum_offer_valueHelp" class="form-text">The price is in colombian pesos and it must be greater than 0.</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="attractive_value" class="col-sm-4 col-form-label">Attractive value of the country</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form-control-lg mb-2" placeholder="Attractive value of the country" name="attractive_value" value="{{ old('attractive_value') }}" />
                                    <div id="attValHelp" class="form-text">The attractive value can be negative or positive, it depends whether the country has good or bad characteristics.</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 text-center">
                                    <input type="submit" class="btn btn-primary" value="Send" />
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