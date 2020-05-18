<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Event;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        
        $user_profile = $user->profile()->first();
        $all = DB::table('results')->where('user_id', $user->id)->get();
        $userCompetitionsResults = [];
        $competitionsParticipatedCount = $all->count();
        $competitionsTOP10Count = 0;
        $competitionsTOP3Count = 0;
        $authorizedUser = Auth::user();
        for($i=0; $i<$all->count();$i++){
            $eventID = $all[$i]->event_id;
            $event = Event::find($eventID);
            $competition = Competition::find($event->competition_id);
            $user_result = $all[$i];
            if($event->result_type == 'time'){             
                $placeByGender = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['user_gender', $user_profile->gender],
                    ['time_result', '<', $user_result->time_result]
                ])->count()+1;
            }
            else{
                $placeByGender = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['user_gender', $user_profile->gender],
                    ['number_result', '>', $user_result->number_result]
                ])->count()+1;
            }
            if($placeByGender <= 10){
                $competitionsTOP10Count++;
            }
            if($placeByGender <= 3){
                $competitionsTOP3Count++;
            }
            
            
            $obj = (object) [
                'event' => $event,
                'competition'=>$competition,
                'placeByGender'=>$placeByGender
            ];
            array_push($userCompetitionsResults, $obj );     
           
        }
        return view('profiles.index', compact('user', 'authorizedUser', 'userCompetitionsResults', 'competitionsParticipatedCount', 'competitionsTOP10Count', 'competitionsTOP3Count'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact("user"));
    }
    public function update(User $user)
    {

        $this->authorize('update', $user->profile);

        $profileData = request()->validate([
            'gender' => 'required',
            'birthday' => 'required| after:1900-01-01| before:'.Carbon::now()->format('Y-m-d'),
            'description' => 'nullable',
            'url' => 'nullable | url',
            'image' => 'mimes:jpeg,png,jpg,svg|max:2048|nullable'

        ]);
        $userData = request()->validate([
            'name' => 'required',
        ]);
        $oldImage = $user->profile->image;
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            //resize image with intervention/image
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            auth()->user()->profile->update(array_merge(
                $profileData,
                ['image' => $imagePath]
            ));
            if($oldImage != null){
                $image_path = public_path("storage/{$oldImage}");
                unlink($image_path);

                // Storage::delete("storage/{$oldImage}");
            }
        } else {
            auth()->user()->profile->update($profileData);
            auth()->user()->update($userData);
        }
        DB::table('results')->where('user_id', $user->id)->update(array('user_gender' => $profileData['gender']));
       


        return redirect("/profile/{$user->id}");
    }
}
