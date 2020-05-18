@extends('layouts.authorized')
@section('title','Create Competition')
@section('content')

<form action="/competition/creating" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <h1>Create Competition</h1>
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Title</p>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" required name="title">

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
                        <option value="{{$sportType->name}}">{{$sportType->name}}</option>
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
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url">

                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Contact email</p>
                <input id="contact" type="email" class="form-control @error('contact') is-invalid @enderror" required name="contact">
                @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Time Zone</p>
                <select class="form-control ml-0 pl-0" id="time_zone" name="time_zone">
                    <option value="-12">UTC−12:00</option>
                    <option value="-11">UTC−11:00</option>
                    <option value="-10">UTC−10:00</option>
                    <option value="-9">UTC−09:00</option>
                    <option value="-8">UTC−08:00</option>
                    <option value="-7">UTC−07:00</option>
                    <option value="-6">UTC−06:00</option>
                    <option value="-5">UTC−05:00</option>
                    <option value="-4">UTC−04:00</option>
                    <option value="-3">UTC−03:00</option>
                    <option value="-2">UTC−02:00</option>
                    <option value="-1">UTC−01:00</option>
                    <option value="0" selected>UTC±00:00</option>
                    <option value="+1">UTC+01:00</option>
                    <option value="+2">UTC+02:00</option>
                    <option value="+3">UTC+03:00</option>
                    <option value="+4">UTC+04:00</option>
                    <option value="+5">UTC+05:00</option>
                    <option value="+6">UTC+06:00</option>
                    <option value="+7">UTC+07:00</option>
                    <option value="+8">UTC+08:00</option>
                    <option value="+9">UTC+09:00</option>
                    <option value="+10">UTC+10:00</option>
                    <option value="+11">UTC+11:00</option>
                    <option value="+12">UTC+12:00</option>
                </select>
                @error('time_zone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Competition Start</p>
                <input class="form-control @error('competition_start') is-invalid @enderror" type="datetime-local" name="competition_start" id="competition_start" step="60">
                @error('competition_start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Competition End</p>
                <input class="form-control @error('competition_end') is-invalid @enderror" type="datetime-local" name="competition_end" id="competition_end">
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
                <input type="file" class="form-control-file " id="image" required name="image">
            </div>
            <div class="form-group row">
                @error('image')
                <strong class='text-danger'>{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Description</p>
                <textarea rows=10 class="form-control @error('description') is-invalid @enderror" id="description" required name="description" autocomplete="off"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Create Competition') }}</button>
            </div>
        </div>
    </div>

</form>
@endsection