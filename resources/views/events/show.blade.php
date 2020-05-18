@extends('layouts.authorized')

@section('content')


<div style="min-height: 100vh">
    <div class="row align-items-center reorder">
        <div class="col-md-12  text-center " id="eventTitle">
            <h1>"{{$competition->title}}"</h1>
        </div>
        <!-- <div class="col-md-3 d-flex  justify-content-end" >
            <a href="{{ url()->previous() }}" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; "  >
                <span class="px-3"> Go Back</span>
            </a>
        </div> -->
    </div>

    <div class="row align-items-start">
        <div class="col-lg-4 text-center">
            <h2 class="my-0">{{$event->event}}</h2>
            <h4 class="mt-1">{{$event->description}}</h4>
            @if($competition->user_id == $user->id)
            <a href="/event/{{$event->id}}/edit" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
                <span class="px-3"> EDIT EVENT</span>
            </a>
            <a href="/event/{{$event->id}}/destroy" class="btn btn-lg wide btn-solid btn-light btn-outline-primary text-uppercase " style="border: 2px solid; max-height:60px; ">
                <span class="px-3"> DELETE EVENT</span>
            </a>
            <br>
            <br>
            @endif
            <div class="row">
                @if($place != 0 && $placeByGender !=0)
                <div class=" col-10 offset-1 text-center  my-3 bg-primary competition-badge">
                    <h2 class=" mb-0 mt-1 text-white">
                        @if($place%10 == 1)
                        {{$place.'st'}}
                        @elseif($place%10 == 2)
                        {{$place.'nd'}}
                        @elseif($place%10 == 3)
                        {{$place.'rd'}}
                        @else
                        {{$place.'th'}}
                        @endif
                        Place
                    </h2>
                    <p class=" mt-0 mb-2 text-white">From All Participants</p>
                </div>
                <div class=" col-10 offset-1 text-center  my-3 bg-warning competition-badge">
                    <h2 class=" mb-0 mt-1 text-white">
                        @if($placeByGender%10 == 1)
                        {{$placeByGender.'st'}}
                        @elseif($placeByGender%10 == 2)
                        {{$placeByGender.'nd'}}
                        @elseif($placeByGender%10 == 3)
                        {{$placeByGender.'rd'}}
                        @endif
                        Place
                    </h2>
                    <p class=" mt-0 mb-2 text-white">
                        @if($user_profile->gender == 'female')Women
                        @elseif($user_profile->gender == 'male')Men
                        @elseif($user_profile->gender == 'other')Other
                        @endif
                        's category</p>
                </div>
                @endif
                @if($place == 0 && $placeByGender ==0)
                <form action="/event/{{$event->id}}/result-add" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-10 offset-1 text-center  my-3 ">
                        <h2 class="mb-0">Add Your Result</h2>
                        @if($event->result_type == 'time')
                        <div class="form-group row ">
                            <div class="col-4">
                                <p class="pb-0 mb-0">Hours</p>
                                <input id="hours" type="number" min="0" class="text-center form-control @error('hours') is-invalid @enderror" required autocomplete="off" name="hours" value="0">
                            </div>
                            <div class="col-4">
                                <p class="pb-0 mb-0">Minutes</p>
                                <input id="minutes" type="number" min="0" max="59" class="text-center form-control @error('event') is-invalid @enderror" required autocomplete="off" name="minutes" value="0">
                            </div>
                            <div class="col-4">
                                <p class="pb-0 mb-0">Seconds</p>
                                <input id="seconds" type="number" min="0" max="59" class="text-center form-control @error('event') is-invalid @enderror" required autocomplete="off" name="seconds" value="0">
                            </div>
                        </div>
                        @else
                        <div class="form-group d-flex justify-content-start align-items-center">
                            <div class="col-4 pl-0 pr-1 text-left">
                                <p class="pb-0 mb-0">Result</p>
                                <input id="number_result" type="number" min="0" class="text-center form-control @error('number_result') is-invalid @enderror" required autocomplete="off" name="number_result" value="0">
                            </div>
                            <div class="col-8 pl-0 text-left">
                                <p class="mb-0" style="font-size: 20px; padding-top: 33px; word-break: break-word; ">{{$event->unit_of_measurment}}</p>
                            </div>

                        </div>

                        @endif
                        <div class="form-group row mt-2 " style="padding-left: 15px">
                            <p class="pb-0 mb-0">Proof URL</p>
                            <input id="proof_url" type="text" class="form-control @error('proof_url') is-invalid @enderror" required name="proof_url">
                            @error('proof_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row" style="padding-left: 15px">
                            <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Add Result') }}</button>
                        </div>
                    </div>
                </form>
                @else
                <div class="col-12">
                    <form action="/event/{{$event->id}}/{{$user_result->id}}/result-update" enctype="multipart/form-data" method="post" class="w-100">
                        @csrf
                        @method('PATCH')
                        <div class=" offset-1 text-center  my-3 ">
                            <h2 class="mb-0">Update Your Result</h2>
                            @if($event->result_type == 'time')
                            <div class="d-none">
                                {{
                                $user_result_hours = intval(date('H', strtotime($user_result->time_result))),
                                $user_result_minutes = intval(date('i', strtotime($user_result->time_result))),
                                $user_result_seconds = intval(date('s', strtotime($user_result->time_result)))
                            }}
                            </div>
                            <div class="form-group row w-100 mx-0">
                                <div class="col-4 px-0 pr-1">
                                    <p class="pb-0 mb-0">Hours</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="hours" type="number" min="0" class="text-center form-control @error('hours') is-invalid @enderror" required autocomplete="off" name="hours" value="{{$user_result_hours}}">
                                </div>
                                <div class="col-4 px-1">
                                    <p class="pb-0 mb-0">Minutes</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="minutes" type="number" min="0" max="59" class="text-center form-control @error('event') is-invalid @enderror" required autocomplete="off" name="minutes" value="{{$user_result_minutes}}">
                                </div>
                                <div class="col-4 px-0 pl-1">
                                    <p class="pb-0 mb-0">Seconds</p>
                                    <input style="padding-left: 2px; padding-right:2px" id="seconds" type="number" min="0" max="59" class="text-center form-control @error('event') is-invalid @enderror" required autocomplete="off" name="seconds" value="{{$user_result_seconds}}">
                                </div>
                            </div>
                            @else
                            <div class="form-group d-flex justify-content-start align-items-center w-100">
                                <div class="col-4 pl-0 pr-1 text-left">
                                    <p class="pb-0 mb-0">Result</p>
                                    <input id="number_result" type="number" min="0" class="text-center form-control @error('number_result') is-invalid @enderror" required autocomplete="off" name="number_result" value="{{$user_result->number_result}}">
                                </div>
                                <div class="col-8 pl-0 text-left">
                                    <p class="mb-0" style="font-size: 20px; padding-top: 33px; word-break: break-word; ">{{$event->unit_of_measurment}}</p>
                                </div>

                            </div>

                            @endif
                            <div class="form-group row mt-2 w-100 mx-0">
                                <p class="pb-0 mb-0">Proof URL</p>
                                <input id="proof_url" type="text" class="form-control @error('proof_url') is-invalid @enderror" required name="proof_url" value="{{$user_result->proof_url}}">
                                @error('proof_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row w-100 mx-0">
                                <button type="submit" class="form-control mb-5" style="background: #1354fe; color:white">{{ __('Update Result') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif


            </div>


        </div>
        <div class="col-lg-8">
            <div class="container">
                <div class='d-none'>
                    @php($active_list = '0')
                    @if( strpos($_SERVER['REQUEST_URI'], 'allResults') !== false){
                    {{$active_list = 1}}
                    }
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false){
                    {{$active_list = 2}}
                    }
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false){
                    {{$active_list = 3}}
                    }
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false){
                    {{$active_list = 4}}
                    }
                    @endif
                </div>
                <ul class="nav nav-tabs d-flex justify-content-between mb-3">
                    <li class=""><a href="?allResults=1">
                            <h4 class="btn-event p-2" @if($active_list===1) style="background: black; color:white" @endif>All</h4>
                        </a></li>

                    <li><a href="?femaleResults=1">
                            <h4 class="btn-event p-2" @if($active_list===2) style="background: black; color:white" @endif>Women's list</h4>
                        </a></li>
                    <li><a href="?maleResults=1">
                            <h4 class="btn-event p-2" @if($active_list===3) style="background: black; color:white" @endif>Men's list</h4>
                        </a></li>
                    <li><a href="?othersResults=1">
                            <h4 class="btn-event p-2" @if($active_list===4) style="background: black; color:white" @endif>Other's list</h4>
                        </a></li>
                </ul>
            </div>
            <!-- 
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div> -->
            <div class="tab-content">
                <div id="allResults" class="tab-pane fade in active">
                    @if(count($results)>0)
                    @php($counter= 1 + ($results->currentPage()-1)*50)
                    <table class="table">
                        <thead class="thead-dark text-center text-center">
                            <tr>
                                <th scope="col">Place</th>
                                <th scope="col">Name</th>
                                <th scope="col">Result</th>
                                <th scope="col">Proof URL</th>
                                @if($competition->user_id == $user->id)
                                <th scope="col">Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($results as $result)
                            <tr class="text-center">
                                <th scope="row">
                                    @if($counter == 1)
                                    <img src="{{ URL::asset('./images/results/first-place.svg')}}" class="award-icon">
                                    @elseif($counter == 2)
                                    <img src="{{ URL::asset('./images/results/second-place.svg')}}" class="award-icon">
                                    @elseif($counter == 3)
                                    <img src="{{ URL::asset('./images/results/third-place.svg')}}" class="award-icon">
                                    @else
                                    {{$counter}}
                                    @endif
                                </th>
                                <td>{{$result->user->name}}</td>
                                <td>
                                    @if($event->result_type == 'time')
                                    {{$result->time_result}}
                                    @else
                                    {{$result->number_result}}
                                    @endif
                                </td>
                                <td><a target='_blank' href="{{$result->proof_url}}">Link to proof</a></td>
                                @if($competition->user_id == $user->id)
                                <td><a href="/result/{{$result->id}}/destroy" class="badge badge-danger p-2">X</a></td>
                                @endif
                            </tr>
                            @php($counter++)
                            @endforeach
                        </tbody>
                    </table>
                    @if( $results->lastPage() > 1)
                    <div class="col-12 d-flex justify-content-center">
                        <ul class="pagination">
                            @php($cur = $results->currentPage())
                            @php($total = $results->lastPage())
                            @if($cur-3 > 0) <li class="page-item"><a class="page-link" href="{{ $results->url(1) }}">First</a></li>@endif
                            @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $results->url($cur-1) }}">
                                    <</a> </li>@endif @if($cur-2> 0)
                            <li class="page-item"><a class="page-link" href="{{ $results->url($cur-2) }}">{{ $cur-2 }}</a></li>@endif
                            @if($cur-1 > 0) <li class="page-item"><a class="page-link" href="{{ $results->url($cur-1) }}">{{ $cur-1 }}</a></li>@endif

                            <li class="page-item active"><span class="page-link">{{ $cur }}</span></li>

                            @if($cur+1 <= $total) <li class="page-item"><a class="page-link" href="{{ $results->url($cur+1) }}">{{ $cur+1 }}</a></li>@endif
                                @if($cur+2 <= $total) <li class="page-item"><a class="page-link" href="{{ $results->url($cur+2) }}">{{ $cur+2 }}</a></li>@endif
                                    @if($cur < $total)<li class="page-item"><a class="page-link" href="{{ $results->url($cur+1) }}">></a></li>@endif
                                        @if($cur+2 < $total) <li class="page-item"><a class="page-link" href="{{ $results->url($total) }}">Last</a></li>@endif
                        </ul>
                    </div>
                    @endif
                    @else
                    @if( strpos($_SERVER['REQUEST_URI'], 'allResults') !== false)
                    <h2>Nobody have competed yet. Be first to compete!</h2>
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false)
                    <h2>No women have participated yet!</h2>
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false)
                    <h2>No men have participated yet!</h2>
                    @elseif( strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false)
                    <h2>Nobody with gender 'other' have participated yet!</h2>
                    @else
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>

@endsection