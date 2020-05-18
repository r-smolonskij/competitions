@extends('layouts.authorized')
@section('title', 'My Organized '.$type->name.' Competitions')
@section('content')

<div>
    <div class="row align-items-center mb-3">
        <div class=" col-md-8">
            <h1 class="" style="word-wrap: break-word;">My Organized {{ucfirst(trans($slug1))}} {{$type->name}} Competitions</h1>
        </div>
        <div class="col-md-4 d-flex  justify-content-md-end"">
            <a href='{{ url()->previous() }}' class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:80px; ">
            <span> Go Back</span>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="row mx-1 my-2">
            </div>
        </div>
        @foreach($competitions as $competition)
        <!-- <h1>{{$competition->title}}</h1> -->
        <div class=" col-lg-4 col-md-6 mb-4">
            <a href="/competition/{{$competition->id}}">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/{{$competition->image}}" class="w-100 competition-show-banner">
                        <h3 class="mt-1 mb-0">{{$competition->title}}</h3>
                        <h5 class="text-black my-0"><i>{{ $competition->type}}</i></h5>
                        <h5 class="mt-0"><span class="text-black"><i class="far fa-clock"></i> {{ $competition->competition_start}}</span></h5>
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
