@extends('layouts.authorized')
@section('title',  'Competitions History')
@section('content')

<div class="col-12 ">
    @if(count($userCompetitionsResults) > 0)
    <h1 class="text-center">Your Competitions History</h1>
    <table class="table">
        <thead class="thead-dark text-center text-center">
            <tr>
                <th scope="col">Competitions</th>
                <th scope="col">Sport's Type</th>
                <th scope="col">Event</th>
                <th scope="col">Result</th>
                <th scope="col">Place</th>
                <th scope="col">Place In
                    @if($user->profile->gender == 'male')
                    Men
                    @elseif($user->profile->gender == 'female')
                    Women
                    @elseif($user->profile->gender == 'other')
                    Other
                    @endif
                    's Category
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($userCompetitionsResults as $result)
            <tr class="text-center">
                <td><a href="/competition/{{$result->competition->id}}"> {{$result->competition->title}}</a></td>
                <td>{{$result->competition->type}}</td>
                <td><a href="/event/{{$result->event->id}}?allResults=1"> {{$result->event->event}}</a></td>
                <td>{{$result->result}}</td>
                <td>{{$result->place}}</td>
                <td>{{$result->placeByGender}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div style="margin-top: 30vh">
        <h1 class="text-center ">You haven't competed in any competitions yet! Check out ongoing competitions here: </h1>
        <div class="text-center">
            <a href="/competitions/ongoing" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mb-3 mr-3 ml-0" style="border: 2px solid; max-height:60px; ">
                <span class=""> Ongoing Competitions</span>
            </a>
        </div>
    </div>
    @endif
</div>


@endsection