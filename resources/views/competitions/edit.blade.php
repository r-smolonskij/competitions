@extends('layouts.authorized')
@section('title', 'Create Competition')
@section('content')

<form action="/competition/{{$competition->id}}/updating" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <h1>Edit Competition</h1>
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Title</p>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" required name="title" value="{{ old('title') ?? $competition->title}}">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Sports Type</p>
                <select class="form-control ml-0 pl-0" id="type" name="type">
                    @foreach($sportTypes as $sportType)
                        <option value="{{$sportType->name}}" {{ $competition->type == $sportType->name ? "selected":"" }}>{{$sportType->name}}</option>
                    @endforeach
                </select>

                @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- <div class="form-group row">
                    <p class="pb-0 mb-0">Result Type</p>
                    <select class="form-control ml-0 pl-0" id="result_type" required name="result_type">
                        <option disabled selected>Select Result Type</option>
                        <option value="time">Time</option>
                        <option value="number">Number</option>
                    </select>
                    @error('result_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> -->

            <div class="form-group row">
                <p class="pb-0 mb-0">Extra URL (Not Required)</p>
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $competition->url}}">

                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Contact email</p>
                <input id="contact" type="email" class="form-control @error('contact') is-invalid @enderror" required name="contact" value="{{ old('contact') ?? $competition->contact}}">
                @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Time Zone</p>
                <select class="form-control ml-0 pl-0" id="time_zone" name="time_zone">
                    <option value="-12" {{ $competition->time_zone == "-12" ? "selected":"" }}>UTC−12:00</option>
                    <option value="-11" {{ $competition->time_zone == "-11" ? "selected":"" }}>UTC−11:00</option>
                    <option value="-10" {{ $competition->time_zone == "-10" ? "selected":"" }}>UTC−10:00</option>
                    <option value="-9" {{ $competition->time_zone == "-9" ? "selected":"" }}>UTC−09:00</option>
                    <option value="-8" {{ $competition->time_zone == "-8" ? "selected":"" }}>UTC−08:00</option>
                    <option value="-7" {{ $competition->time_zone == "-7" ? "selected":"" }}>UTC−07:00</option>
                    <option value="-6" {{ $competition->time_zone == "-6" ? "selected":"" }}>UTC−06:00</option>
                    <option value="-5" {{ $competition->time_zone == "-5" ? "selected":"" }}>UTC−05:00</option>
                    <option value="-4" {{ $competition->time_zone == "-4" ? "selected":"" }}>UTC−04:00</option>
                    <option value="-3" {{ $competition->time_zone == "-3" ? "selected":"" }}>UTC−03:00</option>
                    <option value="-2" {{ $competition->time_zone == "-2" ? "selected":"" }}>UTC−02:00</option>
                    <option value="-1" {{ $competition->time_zone == "-1" ? "selected":"" }}>UTC−01:00</option>
                    <option value="0" {{ $competition->time_zone == "0" ? "selected":"" }}>UTC±00:00</option>
                    <option value="+1" {{ $competition->time_zone == "+1" ? "selected":"" }}>UTC+01:00</option>
                    <option value="+2" {{ $competition->time_zone == "+2" ? "selected":"" }}>UTC+02:00</option>
                    <option value="+3" {{ $competition->time_zone == "+3" ? "selected":"" }}>UTC+03:00</option>
                    <option value="+4" {{ $competition->time_zone == "+4" ? "selected":"" }}>UTC+04:00</option>
                    <option value="+5" {{ $competition->time_zone == "+5" ? "selected":"" }}>UTC+05:00</option>
                    <option value="+6" {{ $competition->time_zone == "+6" ? "selected":"" }}>UTC+06:00</option>
                    <option value="+7" {{ $competition->time_zone == "+7" ? "selected":"" }}>UTC+07:00</option>
                    <option value="+8" {{ $competition->time_zone == "+8" ? "selected":"" }}>UTC+08:00</option>
                    <option value="+9" {{ $competition->time_zone == "+9" ? "selected":"" }}>UTC+09:00</option>
                    <option value="+10" {{ $competition->time_zone == "+10" ? "selected":"" }}>UTC+10:00</option>
                    <option value="+11" {{ $competition->time_zone == "+11" ? "selected":"" }}>UTC+11:00</option>
                    <option value="+12" {{ $competition->time_zone == "+12" ? "selected":"" }}>UTC+12:00</option>
                </select>
                @error('time_zone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Competition Start</p>
                <input class="form-control @error('competition_start') is-invalid @enderror" type="datetime-local" name="competition_start"  value='{{ $competition_start}}' step="60">
                @error('competition_start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Competition End</p>
                <input class="form-control @error('competition_end') is-invalid @enderror" type="datetime-local" name="competition_end" id="competition_end" value="{{ $competition_end}}">
                @error('competition_end')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row mb-0">
                <p class="pb-0 mb-0">Banner Image</p>
            </div>
            <div class="row mt-0">
                <input type="file" class="form-control-file " id="image"  name="image">
            </div>
            <div class="form-group row">
                @error('image')
                <strong class='text-danger'>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Description</p>
                <textarea rows=10 class="form-control @error('description') is-invalid @enderror" id="description" required name="description" autocomplete="off">{{$competition->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Update Competition') }}</button>
            </div>
        </div>
    </div>

</form>
@endsection