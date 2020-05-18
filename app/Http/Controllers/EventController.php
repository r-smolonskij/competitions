<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use App\Event;
use App\Result;
use App\SportType;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create(Competition $competition)
    {
        $user = Auth::user();
        $sportTypes = SportType::all();
        return view('events/create', compact('user', 'sportTypes', 'competition'));
    }
    public function store(Competition $competition)
    {
        $user = Auth::user();
        $data = request()->validate([
            // 'another'=>'',
            'event' => 'required',
            'description' => 'required',
            'result_type' => 'required',
            'unit_of_measurment' => 'nullable',
        ]);
        $competition->events()->create([
            'event' => $data['event'],
            'description' => $data['description'],
            'result_type' => $data['result_type'],
            'unit_of_measurment' => $data['unit_of_measurment'],
        ]);

        return redirect('/competition/' .$competition->id );
        //return view('../competitions/show', compact('user', 'competition'));
    }
    public function show(\App\Event $event){

        // if($slug != "" && $slug !='femaleResults' && $slug !='maleResults' && $slug !='othersResults'){
        //     abort(404);
        // }
        
        
        $user = Auth::user();
        $competition = Competition::find($event->competition_id);
        $user_profile = $user->profile()->first();
        $place=0;
        $placeByGender=0;
        $user_result = 0;
        
        if($event->result_type == 'time'){
            $allResults = $event->results()->orderBy('time_result', 'ASC')->get();
            if(strpos($_SERVER['REQUEST_URI'], 'allResults') !== false){
                $results = $event->results()->orderBy('time_result', 'ASC')->paginate(50, ['*'], 'allResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false){
                $results = $event->results()->where('user_gender', 'female')->orderBy('time_result', 'ASC')->paginate(50, ['*'], 'femaleResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false){
                $results = $event->results()->where('user_gender', 'male')->orderBy('time_result', 'ASC')->paginate(50, ['*'], 'maleResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false){
                $results = $event->results()->where('user_gender', 'other')->orderBy('time_result', 'ASC')->paginate(50, ['*'], 'othersResults');
            }                

            if($allResults->count() > 0){
                $user_result = $allResults->where('user_id',$user->id)->first();
                if($user_result){
                    $place = $allResults->where('time_result', '<', $user_result->time_result)->count()+1; 
                    $placeByGender = DB::table('results')->where([
                            ['event_id', $event->id],
                            ['user_gender', $user_profile->gender],
                            ['time_result', '<', $user_result->time_result]
                        ])->count()+1; 
                }
            }
            
        }else{
            $allResults = $event->results()->orderBy('number_result', 'DESC')->get();
            if(strpos($_SERVER['REQUEST_URI'], 'allResults') !== false){
                $results = $event->results()->orderBy('number_result', 'DESC')->paginate(50, ['*'], 'allResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'femaleResults') !== false){
                $results = $event->results()->where('user_gender', 'female')->orderBy('number_result', 'DESC')->paginate(50, ['*'], 'femaleResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'maleResults') !== false){
                $results = $event->results()->where('user_gender', 'male')->orderBy('number_result', 'DESC')->paginate(50, ['*'], 'maleResults');
            }
            else if(strpos($_SERVER['REQUEST_URI'], 'othersResults') !== false){
                $results = $event->results()->where('user_gender', 'other')->orderBy('number_result', 'DESC')->paginate(50, ['*'], 'othersResults');
            }
            if($allResults->count() > 0){
                $user_result = $allResults->where('user_id',$user->id)->first();
                if($user_result){
                    $place = $allResults->where('number_result', '>', $user_result->number_result)->count()+1; 
                    $placeByGender = DB::table('results')->where([
                            ['event_id', $event->id],
                            ['user_gender', $user_profile->gender],
                            ['number_result', '>', $user_result->number_result]
                        ])->count()+1; 
                }
            }                
            // $user_result = $results->where('user_id','==' ,$user->id)->first()->number_result;
            // $place = $results->where('number_result', '>', $user_result)->count()+1;
        }
        return view('events/show', compact('competition', 'user', 'event', 'results', 'place', 'placeByGender', 'user_profile', 'user_result' ));
        // $place = $event->results()::getQuery("select t1.*, count(t2.id) + 1 as rank from results t1 left join results t2 on t2.time_result > t1.time_result where t1.id = 1 group by t1.id ");
    //    dd($results->where('user_id','==' ,$user->id)->time_result);
        // SELECT COUNT(*) as pos FROM results WHERE time_result < $event->user()->result();
        
        
        
    }

    public function edit(\App\Event $event){
        $user = Auth::user();
        $competition = Competition::find($event->competition_id);
        return view('events/edit', compact("user", 'competition', 'event'));
    }
    public function update(Event $event)
    {
        $user = Auth::user();

        $eventData = request()->validate([
            'event' => 'required',
            'description' => 'required',
            'result_type' => 'required',
            'unit_of_measurment' => 'nullable',

        ]);
     
        $event->update($eventData);
        return redirect("/event/{$event->id}");
    }
    public function destroy(Event $event){
        $competition_id = $event->competition_id;
        $this->authorize('event-isOrganizator', $event);
        $results = Result::where('event_id', $event->id);
        $results->delete();
        $event->delete();
        return redirect('competition/'.$competition_id);
    }
}
