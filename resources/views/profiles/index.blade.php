@extends('layouts.authorized')
@section('title', 'Virtual Components - '.$user->name)
@section('content')

<div class="row mx-2">
    <div class="col-lg-4 col-md-6">

        <div class="card">
            <div class="card-body">
                <img src="{{ $user->profile->profileImage()}}" alt="">
                <h2 class="mt-0 mb-0">{{$user->name}}</h2>
                <h3 class="mt-0">{{\Carbon\Carbon::parse($user->profile->birthday)->diff(\Carbon\Carbon::now())->format('%y years')}} old</h3>

                @if (!is_null($user->profile->url))
                <hr>
                <h3 class="mt-0"><u>Social media link:</u> <a href="{{ $user->profile->url}}">{{ $user->profile->url}}</a></h3>
                <hr>
                @endif
                @if (!is_null($user->profile->description))
                <h3 class="mt-0 mb-0"><u>About {{$user->name}}:</u></h3>
                <h3 class="mt-0">{{$user->profile->description}}</h3>
                @endif


            </div>
        </div>


        <!-- <h3 class="mt-0">{{\Carbon\Carbon::parse($user->profile->birthday)->diff(\Carbon\Carbon::now())->format('%y years')}} old</h3> -->
    </div>
    <div class="col-lg-8 col-md-6 mt-3">
        <div class="row d-flex justify-content-between ">
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-primary competition-badge">
                <h2 class=" mb-0 mt-1 text-white">{{$competitionsParticipatedCount}}</h2>
                <p class=" mt-0 mb-2 text-white">Competitions Participated</p>
            </div>
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-danger competition-badge">
                <h2 class=" mb-0 mt-1 text-white">{{$competitionsTOP10Count}}</h2>
                <p class=" mt-0 mb-2 text-white">TOP-10 Finishes</p>
            </div>
            <div class="col-lg-3 col-md-5 text-center  mb-3 bg-success competition-badge">
                <h2 class=" mb-0 mt-1 text-white">{{$competitionsTOP3Count}}</h2>
                <p class=" mt-0 mb-2 text-white">TOP-3 Finishes</p>
            </div>
        </div>
        <h2>Competition history</h2>
        @foreach($userCompetitionsResults as $res)
        <h4 style="font-family:'Courier New', Courier, monospace ;"><span class="text-dark">
                @if($res->placeByGender%10 == 1)
                {{$res->placeByGender.'st'}}
                @elseif($res->placeByGender%10 == 2)
                {{$res->placeByGender.'nd'}}
                @elseif($res->placeByGender%10 == 3)
                {{$res->placeByGender.'rd'}}
                @else
                {{$res->placeByGender.'th'}}
                @endif
                Place
            </span> at <a href="/competition/{{$res->competition->id}}">{{$res->competition->title}}</a>(<a href="/event/{{$res->event->id}}?allResults=1">{{$res->event->event}}</a>)</h4>
        @endforeach
    </div>
</div>



@endsection