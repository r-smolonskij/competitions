@extends('layouts.authorized')
@section('title', ucfirst(trans($slug)).' Competitions')
@section('content')

<div style="min-height: 100vh">
    @if(count($competitions)>0)
    <h1>All {{ucfirst(trans($slug))}} Competitions</h1>
    @endif
    <div class="row">
        @if(count($competitions)>0)
        <div class="col-12">
            <div class="row mx-1 my-2">
                
                @foreach($sportTypes as $sportType)
                <a href="/competitions/{{$slug}}/{{$sportType->name}}" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase mx-0" style="border: 2px solid">
                    <span> {{$sportType->name}}</span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @if(count($competitions)>0)
        @foreach($competitions as $competition)
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="/competition/{{$competition->id}}">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/{{$competition->image}}" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0">{{$competition->title}}</h3>
                        @if($competition->time_zone == 0)
                        @php($t_zone = '(UTC±0)')
                        @else
                        @php($t_zone = '(UTC'.$competition->time_zone.')')
                        @endif
                        <h5 class="text-black my-0"><i>{{ $competition->type}}</i></h5>
                        <h5 class="mt-0 mb-0 text-black"><u><b>Starts:</b></u> {{ \Carbon\Carbon::parse($competition->competition_start)->format('d/m/Y H:i')}}
                            {{$t_zone}}
                            <h5 class="mt-0 text-black"><u><b>Finishes:</b></u> {{ \Carbon\Carbon::parse($competition->competition_end)->format('d/m/Y H:i')}}
                                {{$t_zone}}
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
                @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-1) }}">
                        <</a> </li>@endif @if($cur-2> 0)
                <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-2) }}">{{ $cur-2 }}</a></li>@endif
                @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur-1) }}">{{ $cur-1 }}</a></li>@endif

                <li class="page-item active"><span class="page-link">{{ $cur }}</span></li>

                @if($cur+1 <= $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+1) }}">{{ $cur+1 }}</a></li>@endif
                    @if($cur+2 <= $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+2) }}">{{ $cur+2 }}</a></li>@endif
                        @if($cur < $total)<li class="page-item"><a class="page-link" href="{{ $competitions->url($cur+1) }}">></a></li>@endif
                            @if($cur+2 < $total) <li class="page-item"><a class="page-link" href="{{ $competitions->url($total) }}">Last</a></li>@endif
            </ul>
        </div>
        @endif
        @else
        <div class="mt-5" style="margin-top: 20vh !important">
            <h1 class="text-center px-3">There are no {{ucfirst(trans($slug))}} Competitions at this point! Check out later or make your own Competitions here:</h1>
            <div class="col-12 d-flex justify-content-center">
                <a href='/competition/create' class=" btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style=" border: 2px solid; max-height:80px; ">
                    <span> Create Competitions</span>
                </a>
            </div>
        </div>
        @endif

    </div>
</div>



@endsection
