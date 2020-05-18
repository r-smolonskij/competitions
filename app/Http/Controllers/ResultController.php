<?php

namespace App\Http\Controllers;

use App\Event;
use App\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function store(Event $event)
    {
        $user = Auth::user();
        $profile = $user->profile()->get();
        $data = '';
        
        if ($event->result_type == 'time') {
            $data = request()->validate([
                'hours' => 'required',
                'minutes' => 'required',
                'seconds' => 'required',
                'proof_url' => 'required|url',
            ]);
            $hours = $data['hours'] > 9 ? $data['hours'] : '0'.$data['hours'];
            $minutes = $data['minutes'] > 9 ? $data['minutes'] : '0'.$data['minutes'];
            $seconds = $data['seconds'] > 9 ? $data['seconds'] : '0'.$data['seconds'];
            $time = $hours.':'.$minutes.':'.$seconds;
            // dd($user->id);
            $event->results()->create([
                'user_id' => $user->id,
                'time_result' => $time,
                'proof_url' => $data['proof_url'],
                'user_gender' => $profile[0]->gender,
            ]);
           
        }else{
            
            $data = request()->validate([
                'number_result' => 'required',
                'proof_url' => 'required|url',
            ]);
            $event->results()->create([
                'user_id' => $user->id,
                'number_result' => $data['number_result'],
                'proof_url' => $data['proof_url'],
                'user_gender' => $profile[0]->gender,
            ]);
        }
        return redirect()->back();
    }

    public function update(Event $event, Result $result){

        $user = Auth::user();
        if ($event->result_type == 'time') {
            $data = request()->validate([
                'hours' => 'required',
                'minutes' => 'required',
                'seconds' => 'required',
                'proof_url' => 'required|url',
            ]);
            $hours = $data['hours'] > 9 ? $data['hours'] : '0'.$data['hours'];
            $minutes = $data['minutes'] > 9 ? $data['minutes'] : '0'.$data['minutes'];
            $seconds = $data['seconds'] > 9 ? $data['seconds'] : '0'.$data['seconds'];
            $time = $hours.':'.$minutes.':'.$seconds;
             
            $result->update(array_merge(
                ['time_result' => $time],
                ['proof_url' => $data['proof_url']],
            ));
        }
        else{
            $data = request()->validate([
                'number_result' => 'required',
                'proof_url' => 'required|url',
            ]);
            $result->update($data);
        }

        return redirect()->back();
    }
    public function destroy(Result $result){
        // $res = Result::find($result->id);
        $event = Event::find($result->event_id);
        $this->authorize('event-isOrganizator', $event);
        $result -> delete();
        return redirect()->back();
    }
}
