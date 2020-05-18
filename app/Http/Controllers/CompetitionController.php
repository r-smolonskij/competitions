<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Competition;
use App\SportType;
use Carbon\Carbon;
use App\Event;
use App\Result;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug)
    {

        $user = Auth::user();
        $competitions = Competition::get();
        $now = Carbon::parse(Carbon::now() . date(''));
        if($slug == "ongoing"){
            $competitions = DB::table('competitions')->where([
                ['competition_start_UTC', '<', $now],
                ['competition_end_UTC', '>', $now],
            ])->paginate(15);
        }else if($slug == "upcoming"){  
            $competitions = DB::table('competitions')->where('competition_start_UTC', '>', $now)->orderBy('competition_start_UTC', 'asc')->paginate(15);
        }else{
            abort(404);
        }
        $sportTypes = SportType::all();
        return view('competitions/public/index', compact('user', 'competitions', 'sportTypes', 'slug'));
    }

    public function competitionsHistory()
    {
        $user = Auth::user();
        $user_profile = $user->profile()->first();
        $all = DB::table('results')->where('user_id', $user->id)->get();
        $userCompetitionsResults = [];
        for($i=0; $i<$all->count();$i++){
            $eventID = $all[$i]->event_id;
            $event = Event::find($eventID);
            $competition = Competition::find($event->competition_id);
            $user_result = $all[$i];
            if($event->result_type == 'time'){     
                $place = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['time_result', '<', $user_result->time_result]
                ])->count()+1;        
                $placeByGender = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['user_gender', $user_profile->gender],
                    ['time_result', '<', $user_result->time_result]
                ])->count()+1;
                $user_result = $user_result->time_result;
            }
            else{
                $place = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['number_result', '>', $user_result->number_result]
                ])->count()+1;
                $placeByGender = DB::table('results')->where([
                    ['event_id', $event->id],
                    ['user_gender', $user_profile->gender],
                    ['number_result', '>', $user_result->number_result]
                ])->count()+1;
                $user_result = $user_result->number_result.' '.$event->unit_of_measurment;
            }
            $obj = (object) [
               
                'event' => $event,
                'competition'=>$competition,
                'result' => $user_result,
                'place' => $place,
                'placeByGender'=>$placeByGender
            ];
            array_push($userCompetitionsResults, $obj );     
           
        }
        
        return view('competitions/history', compact('user', 'userCompetitionsResults'));
    }

    public function edit(Competition $competition)
    {
        $user = Auth::user();
        $this->authorize('competition-isOrganizator', $competition);
        $sportTypes = SportType::all();
        $competition_start = Str::substr($competition->competition_start, 0, 10) . 'T' . Str::substr($competition->competition_start, 11);
        $competition_end = Str::substr($competition->competition_end, 0, 10) . 'T' . Str::substr($competition->competition_end, 11);
        return view('competitions/edit', compact("user", 'competition', 'sportTypes', 'competition_start', 'competition_end'));
    }
    public function update(Competition $competition)
    {
        $user = Auth::user();
        $this->authorize('competition-isOrganizator', $competition);

        $competitionData = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'url' => 'nullable | url',
            'image' => 'mimes:jpeg,png,jpg,svg|max:2048|nullable',
            'contact' => 'required',
            'time_zone' => 'required',
            'competition_start' => 'required',
            'competition_end' => 'required',

        ]);
        $oldImage = $competition->image;

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
            $competition->update(array_merge(
                $competitionData,
                ['competition_start_UTC' => Carbon::parse($competitionData['competition_start'])->addHours(-$competitionData['time_zone']) . date('')],
                ['competition_end_UTC' => Carbon::parse($competitionData['competition_end'])->addHours(-$competitionData['time_zone']) . date('')],
                ['image' => $imagePath]
            ));
            if ($oldImage != null) {
                $image_path = public_path("storage/{$oldImage}");
                unlink($image_path);
            }
        } else {
            $competition->update(array_merge(
                $competitionData,
                ['competition_start_UTC' => Carbon::parse($competitionData['competition_start'])->addHours(-$competitionData['time_zone']) . date('')],
                ['competition_end_UTC' => Carbon::parse($competitionData['competition_end'])->addHours(-$competitionData['time_zone']) . date('')],
            ));
        }


        return redirect("/competition/{$competition->id}");
    }
    
    public function showByType($slug1, $slug2)
    {      
        $user = Auth::user();
        $now = Carbon::parse(Carbon::now() . date(''));
        $type = SportType::where('name', '=', $slug2)->first();
        if ($type == null) {
            abort(404);
        }
        if($slug1 == "ongoing"){
            $competitions = DB::table('competitions')->where([
                ['competition_start_UTC', '<', $now],
                ['competition_end_UTC', '>', $now],
                ['type', $type->name]
            ])->paginate(15);
        }else if($slug1 == "upcoming"){  
            $competitions = DB::table('competitions')->where([
                ['competition_start_UTC', '>', $now],
                ['type', $type->name]
            ])->orderBy('competition_start_UTC', 'asc')->paginate(15);
        }else{
            abort(404);
        }
        return view('competitions/public/showbytype', compact('user', 'competitions', 'type', 'slug1'));
    }

    public function myCompetitionsShowAllByType($slug1, $slug2)
    {      
        $user = Auth::user();
        $now = Carbon::parse(Carbon::now() . date(''));
        $type = SportType::where('name', '=', $slug2)->first();
        if ($type == null) {
            abort(404);
        }
        if($slug1 == "ongoing"){
            $competitions = DB::table('competitions')->where([
                ['competition_start_UTC', '<', $now],
                ['competition_end_UTC', '>', $now],
                ['type', $type->name],
                ['user_id', $user->id]
            ])->paginate(15);
        }else if($slug1 == "upcoming"){  
            $competitions = DB::table('competitions')->where([
                ['competition_start_UTC', '>', $now],
                ['type', $type->name],
                ['user_id', $user->id]
            ])->orderBy('competition_start_UTC', 'asc')->paginate(15);
        }else{
            abort(404);
        }
        return view('competitions/own/mycompetitionsshowbytype', compact('user', 'competitions', 'type', 'slug1'));
    }
    public function create()
    {
        $user = Auth::user();
        $sportTypes = SportType::all();
        return view('competitions/create', compact('user', 'sportTypes'));
    }

    public function store()
    {
        $data = request()->validate([
            // 'another'=>'',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'url' => 'nullable',
            'contact' => 'required',
            'time_zone' => 'required',
            'competition_start' => 'required',
            'competition_end' => 'required| after_or_equal:competition_start',
            'competition_start_UTC' => 'nullable',
            'competition_end_UTC' => 'nullable',
            'image' => ["required", "image"],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        //resize image with intervention/image
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        //get user_id from authenticated users
        auth()->user()->competitions()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'url' => $data['url'],
            'contact' => $data['contact'],
            'time_zone' => $data['time_zone'],
            'competition_start' => $data['competition_start'],
            'competition_end' => $data['competition_end'],
            'competition_start_UTC' => Carbon::parse($data['competition_start'])->addHours(-$data['time_zone']) . date(''),
            'competition_end_UTC' => Carbon::parse($data['competition_end'])->addHours(-$data['time_zone']) . date(''),
            'image' => $imagePath,
        ]);

        return $this->myCompetitions();
    }
    public function show(\App\Competition $competition)
    {
        $user = Auth::user();
        $events = $competition->events()->get();
        $sign = Str::substr($competition->time_zone, 0, 1);
        $num = Str::substr($competition->time_zone, 1, 3);
        $time_zone = ':00';
        if (Str::length($num) < 2) {
            $num = "0" . $num;
        }
        $time_zone = $sign . $num . $time_zone;
        return view('competitions/show', compact('competition', 'user', 'time_zone', 'events'));
    }
    public function myCompetitions()
    {
        $user = Auth::user();
        $now = Carbon::parse(Carbon::now() . date(''));
        $myorganizedongoingcompetitions =  DB::table('competitions')->where([['user_id', $user->id], ['competition_end_UTC', '>', $now], ['competition_start_UTC', '<', $now]])->orderBy('competition_start_UTC', 'ASC')->take(3)->get();
        $myorganizedupcomingcompetitions =  DB::table('competitions')->where([['user_id', $user->id], ['competition_start_UTC', '>', $now]])->orderBy('competition_start_UTC', 'ASC')->take(3)->get();
        $myorganizedfinishedcompetitions =  DB::table('competitions')->where([['user_id', $user->id], ['competition_end_UTC', '<', $now]])->orderBy('competition_start_UTC', 'ASC')->take(3)->get();
        $allcompetitions = Competition::all();
        return view('competitions/own/mycompetitions', compact('myorganizedongoingcompetitions', 'myorganizedupcomingcompetitions', 'myorganizedfinishedcompetitions', 'allcompetitions', 'user'));
    }
    public function myCompetitionsShowAll($slug){
        
        // if ($slug != "upcoming" && $slug !="ongoing" && $slug !="finished") {
        //     abort(404);
        // }
        $competitions='';
        $sportTypes = SportType::all();
        
        $user = Auth::user();
        $now = Carbon::parse(Carbon::now() . date(''));
        if($slug == "ongoing"){
            $competitions = DB::table('competitions')->where([['user_id', $user->id], ['competition_end_UTC', '>', $now], ['competition_start_UTC', '<', $now]])->orderBy('competition_start_UTC', 'ASC')->paginate(15);
        }else if($slug == "upcoming"){  
            $competitions = DB::table('competitions')->where([['user_id', $user->id], ['competition_start_UTC', '>', $now]])->orderBy('competition_start_UTC', 'ASC')->paginate(15);
        }else if($slug == "finished"){
            $competitions = DB::table('competitions')->where([['user_id', $user->id], ['competition_end_UTC', '<', $now]])->orderBy('competition_start_UTC', 'ASC')->paginate(15);
        }else{
            abort(404);
        }
        return view('competitions/own/mycompetitionsshowall', compact('competitions', 'user', 'slug', 'sportTypes'));
    }
    public function destroy(Competition $competition){
        $this->authorize('competition-isOrganizator', $competition);
        $events = Event::where('competition_id', $competition->id)->get();
        for($i=0; $i<$events->count();$i++){
            $event_id = $events[$i]->id;     
            Result::where('event_id', $event_id)->delete();
            Event::where('id', $event_id)->delete();
        }
        $oldImage= $competition->image;
        if($oldImage!=null){
            $image_path = public_path("storage/{$oldImage}");
            unlink($image_path);
        }
        $competition->delete();
       
        return redirect('competitions/my-competitions');
       
    }
}
