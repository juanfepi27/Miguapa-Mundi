@extends('layouts.app')
@section('title', $viewData["titleTemplate"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary"><strong>Create a new alliance</strong></div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('alliance.save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name of the alliance</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg mb-2" placeholder="Name of the alliance" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label">Image of the alliance</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file mb-2"  name="image" value="{{ old('image') }}" />
                                    <div id="imageHelp" class="form-text">Attach an image, it can be of the types png, jpg or jpeg.</div>
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