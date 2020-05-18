@extends('layouts.authorized')
@section('title', ' - Edit Profile')
@section('content')
<div class="container">

    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <p class="pb-0 mb-0">Full Name</p>
                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <p class="pb-0 mb-0">Gender</p>
                    <select class="form-control ml-0 pl-0" id="gender" name="gender">
                        <option value="female" {{ $user->profile->gender == "female" ? "selected":"" }}>Female</option>
                        <option value="male" {{ $user->profile->gender == "male" ? "selected":"" }}>Male</option>
                        <option value="other" {{ $user->profile->gender == "other" ? "selected":"" }}>Other</option>
                    </select>

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <p class="pb-0 mb-0">Date Of Birth</p>
                    <input type="text" class="form-control @error('birthday') is-invalid @enderror" id="datepicker" name="birthday" autocomplete="off" value="{{ old('birthday') ?? $user->profile->birthday }}">

                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <p class="pb-0 mb-0">Social Media URL</p>
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="datepicker" name="url" autocomplete="off" value="{{ old('url') ?? $user->profile->url }}">

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <p class="pb-0 mb-0">Profile Image</p>
                </div>
                <div class="row mt-0">
                    <input type="file" class="form-control-file " id="image" name="image">
                </div>
                <div class="form-group row">
                    @error('image')
                    <strong class='text-danger'>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <p class="pb-0 mb-0">Description</p>
                    <textarea rows=10 class="form-control @error('description') is-invalid @enderror" id="datepicker" name="description" autocomplete="off">{{ old('description') ?? $user->profile->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Save Profile') }}</button>
                </div>
            </div>
        </div>

    </form>

</div>
@endsection