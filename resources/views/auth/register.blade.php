@extends('layouts.app')
@section('title', 'CoachApp - Register')
@section('content')
<section class="section pt-70 pb-70 d-flex flex-column justify-content-center " data-enable-fullheight="true" style="background-image: url(https://images.pexels.com/photos/207779/pexels-photo-207779.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);" data-parallax-bg="true" style="">
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center" style="margin-bottom: 200px">
            <div class="col-md-6" style="max-width: 350px">
                <div class="card">
                    <div class="card-header text-center ">
                        <h2 class="my-2">Register</h2>
                    </div>
                    <div class="contact-form contact-default contact-default-alt2 px-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row justify-content-center">
                                <p class="col-md-12 mb-30"><span class="form-group"><input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name"></span></p>
                                @error('name')
                                <p class="col-md-12 mb-30 text-danger">{{ $message }}</p>
                                @enderror
                                <p class="col-md-12 mb-30"><span class="form-group"><input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus></span></p>
                                @error('email')
                                <p class="col-md-12 mb-30 text-danger">{{ $message }}</p>
                                @enderror
                                <div class="w-100 px-3">
                                    <input type="text" id="datepicker" name="birthday" autocomplete="off" placeholder="Date Of Birth">
                                </div>
                                @error('birthday')
                                <p class="col-md-12 mb-30 text-danger">{{ $message }}</p>
                                @enderror
                                <div class="w-100 px-3">
                                    <select class="form-control ml-0 pl-0" id="gender" name="gender">
                                        <option disabled selected>Select Gender</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                @error('gender')
                                <p class="col-md-12 mb-30 text-danger">{{ $message }}</p>
                                @enderror
                                <p class="col-md-12 mb-30"><span class="form-group"><input id="password" type="password" class="form-control " name="password" required autocomplete="current-password" placeholder="Password"></span></p>
                                @error('password')
                                <p class="col-md-12 mb-30 text-danger">{{ $message }}</p>
                                @enderror
                                <p class="col-md-12 mb-30 "><span class="form-group"><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password"></span></p>


                                <div class="col-md-12 mb-30 justify-content-center">
                                    <button type="submit" class="form-control m-auto">{{ __('Register') }}</button>
                                </div>
                                <a class="text-primary my-2" href="/sign-in">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


{{--
@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
--}}