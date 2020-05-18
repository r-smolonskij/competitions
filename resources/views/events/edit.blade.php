@extends('layouts.authorized')

@section('content')




<form action="/event/{{$event->id}}/updating" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-10 offset-1">

            <div class="row">
                <div class="col-12 text-center mb-0">
                    <h1 class="mb-0">"{{$competition->title}}"</h1>
                    <h2 class="my-0">"{{$event->event}}"</h2>
                </div>
                <div class="col-12 mt-0">
                    <h2>Update Event</h2>
                </div>


            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Event Title</p>
                <input id="title" type="text" class="form-control @error('event') is-invalid @enderror" required name="event" value="{{$event->event}}">

                @error('event')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
           
            <div class="form-group row">
                    <p class="pb-0 mb-0">Result Type</p>
                    <select class="form-control ml-0 pl-0" id="result_type" required name="result_type">
                        <option disabled>Select Result Type</option>
                        <option value="time" {{ $event->result_type == "time" ? "selected":"" }}>Time</option>
                        <option value="number" {{ $event->result_type == "number" ? "selected":"" }}>Number</option>
                    </select>
                    @error('result_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group row">
                <p class="pb-0 mb-0">Unit Of Measurment(If your result type is 'Time' then this field is not needed)</p>
                <input id="unit_of_measurment" maxlength="12" type="text" class="form-control @error('unit_of_measurment') is-invalid @enderror" name="unit_of_measurment" value="{{$event->unit_of_measurment}}">

                @error('unit_of_measurment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <p class="pb-0 mb-0">Description</p>
                <textarea rows=10 class="form-control @error('description') is-invalid @enderror" id="description" required name="description" autocomplete="off" >{{$event->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Update Event') }}</button>
            </div>
        </div>
    </div>

</form>
@endsection