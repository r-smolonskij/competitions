@extends('layouts.authorized')
@section('title', 'My '.ucfirst(trans($slug)).' Competitions')
@section('content')

<div>
    <h1>My {{ucfirst(trans($slug))}} Competitions</h1>
    <div class="row">
        <div class="col-12">
            <div class="row mx-1 my-2">
                @foreach($sportTypes as $sportType)
                <a href="/competitions/my-competitions/{{$slug}}/{{$sportType->name}}" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mx-0" style="border: 2px solid">
                    <span> {{$sportType->name}}</span>
                </a>
                @endforeach
            </div>
        </div>

        @foreach($competitions as $competition)
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="/competition/{{$competition->id}}">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/{{$competition->image}}" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0">{{$competition->title}}</h3>
                        <h5 class="text-black my-0"><i>{{ $competition->type}}</i></h5>
                        <h5 class="mt-0 mb-0 text-black"><u><b>Starts:</b></u> {{ \Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')}}
                                @if($competition->time_zone == 0)
                                (UTC±0)
                                @else
                                (UTC{{$competition->time_zone}})
                                @endif
                                <h5 class="mt-0 text-black"><u><b>Finishes:</b></u> {{ \Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')}}
                                    @if($competition->time_zone == 0)
                                    (UTC±0)
                                    @else
                                    (UTC{{$competition->time_zone}})
                                    @endif
                                </h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @if( $competitions->lastPage() > 1)
        <div class="col-12 d-flex justify-content-center">
            <ul class="pagination">
                @php($cur = $competitions->currentPage())
                @php($total = $competitions->lastPage())
                @if($cur-3 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url(1) }}">First</a></li>@endif
                @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-1) }}"><</a></li>@endif
                @if($cur-2 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-2) }}">{{ $cur-2 }}</a></li>@endif
                @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-1) }}">{{ $cur-1 }}</a></li>@endif

                <li class="page-item active"><span class="page-link">{{ $cur }}</span></li>

                @if($cur+1 <= $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+1) }}">{{ $cur+1 }}</a></li>@endif
                @if($cur+2 <= $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+2) }}">{{ $cur+2 }}</a></li>@endif
                @if($cur < $total)<li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+1) }}">></a></li>@endif
                @if($cur+2 < $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($total) }}">Last</a></li>@endif
            </ul>
        </div>
        @endif

    </div>
</div>



@endsection