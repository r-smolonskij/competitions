@extends('layouts.authorized')
@section('title', $competition->title)
@section('content')


@if($competition->time_zone == 0)
@php($t_zone = '(UTC±0)')
@else
@php($t_zone = '(UTC'.$competition->time_zone.')')
@endif
<div class="row reorder">
    <div class="col-md-9 offset-1" id="competitionCard">
        <div class="card">
            <div class="card-body ">
                <img src="/storage/{{$competition->image}}" class="w-100">
                <h1 class="my-2 ">{{$competition->title}}</h1>
                <h4 class="mt-0 text-black">
                    <u><b>Starts:</b></u> {{ \Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')}}
                    {{$t_zone}}
                </h4>
                <h4 class="mt-0 text-black"><u><b>Finishes:</b></u> {{ \Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')}}
                    {{$t_zone}}
                </h4>
                <h4 class="mt-1 ">
                    {{$competition->description}}
                </h4>
                <br>
                <h5 class="text-dark"><u>Contact for more information:</u> {{$competition->contact}}</h5>
                @if (!is_null($competition->url))
                <h4 class="text-dark"><u>Website for more information:</u> <a href="{{$competition->url}}">{{$competition->url}}</a></h4>
                @endif
                </h4>
                @if($user->id === $competition->user_id)
                <br>
                <br>
                
                <a href="/competition/{{$competition->id}}/edit" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Edit Competition</span>
                </a>
                <a href="/competition/{{$competition->id}}/event/create" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Add Event</span>
                </a>
                <a href="/competition/{{$competition->id}}/destroy" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 ml-0" style="border: 2px solid; max-height:60px; ">
                    <span class=""> Delete Competition</span>
                </a>
                @endif

                @if(count($events)>0)
                <h2 class="mb-4">Events: </h2>
                <div class="row d-flex justify-content-between mx-5">
                    @foreach($events as $event)
                    <div class="col-md-5 text-center btn-event d-flex align-items-center justify-content-center mb-3 px-0 ">
                        <a href="/event/{{$event->id}}?allResults=1">
                            <div>
                                <span class="w-100  my-1 text-uppercase" style="font-size: 32px; word-wrap:break-word">{{$event->event}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2 d-flex mb-3 justify-content-end">
        <a href="{{ url()->previous() }}" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
            <span class="px-3"> Go Back</span>
        </a>
    </div>
</div>

@endsection