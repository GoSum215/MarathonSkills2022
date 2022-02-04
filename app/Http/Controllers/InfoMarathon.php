<?php

namespace App\Http\Controllers;

use App\Enums\EventType;
use App\Models\Event;
use App\Models\Marathon;
use App\Models\RegistrationEvent;
use App\Models\Runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoMarathon extends Controller
{
    public function getList()
    {
        $marathons = Marathon::query()
            ->orderBy('created_at')
            ->orderBy('id')
            ->paginate(4);
        return view('list_marathons', ['marathons' => $marathons]);
    }
    public function getDetails(/*Request $request,*/ string $slug)
    {
        $marathon = Marathon::query()
            ->where('slug', $slug)
            ->first();
        if($marathon === null) {
            abort(404);
        }
        $events = Event::query()
            ->where('marathon_id', $marathon->id)
            ->orderBy('event_type')
            ->get('event_type');
        $eve = [];
        foreach ($events as $event) {
            $eve[$event->event_type] = 'true';
        }

        if($marathon->date_start_marathon >= date("Y-m-d", strtotime(now().'+ 0 days'))) {
            if ($marathon->date_start_marathon <= date("Y-m-d", strtotime(now().'+ 1 days'))) {
                $even = DB::table('marathons')
                    ->join('events', 'marathons.id', '=', 'events.marathon_id')
                    ->select('events.event_type as type', 'events.time_start_event as time')
                    ->where('marathons.id', '=', $marathon->id)
                    ->get();
                return view('info_about_running_marathon', ['marathon' => $marathon, 'eve' => $eve, 'even' => $even, 'slug' => $marathon->slug]);
            }
            return view('info_about_marathon', ['marathon' => $marathon, 'eve' => $eve, 'slug' => $marathon->slug]);
        }

        $marat = DB::table('marathons')
            ->join('events', 'marathons.id', '=', 'events.marathon_id')
            ->join('registration_events', 'events.id', '=', 'registration_events.event_id')
            ->join('runners', 'runners.id', '=', 'registration_events.runner_id')
            ->join('users', 'users.id', '=', 'runners.user_id')
            ->select('marathons.marathon_name as name', 'marathons.city_name as city', 'marathons.country as country', 'marathons.date_start_marathon as date')
            ->where('marathons.id', '=', $marathon->id)
            ->orderBy('registration_events.race_time')
            ->first();

        //$marathons = $mar->select('users.surname as surname', 'users.name as name', 'registration_events.race_time as time', 'runners.country as country')->get();

        $marathons5 = DB::table('marathons')
            ->join('events', 'marathons.id', '=', 'events.marathon_id')
            ->join('registration_events', 'events.id', '=', 'registration_events.event_id')
            ->join('runners', 'runners.id', '=', 'registration_events.runner_id')
            ->join('users', 'users.id', '=', 'runners.user_id')
            ->select('users.surname as surname', 'users.name as name', 'registration_events.race_time as time', 'runners.country as country')
            ->where('marathons.id', '=', $marathon->id)
            ->orderBy('registration_events.race_time')
            ->where('events.event_type', '=', EventType::SMALL_MARATHON)->get();

        $marathons10 = DB::table('marathons')
            ->join('events', 'marathons.id', '=', 'events.marathon_id')
            ->join('registration_events', 'events.id', '=', 'registration_events.event_id')
            ->join('runners', 'runners.id', '=', 'registration_events.runner_id')
            ->join('users', 'users.id', '=', 'runners.user_id')
            ->select('users.surname as surname', 'users.name as name', 'registration_events.race_time as time', 'runners.country as country')
            ->where('marathons.id', '=', $marathon->id)
            ->orderBy('registration_events.race_time')
            ->where('events.event_type', '=', EventType::QUARTER_MARATHON)->get();

        $marathons21 = DB::table('marathons')
            ->join('events', 'marathons.id', '=', 'events.marathon_id')
            ->join('registration_events', 'events.id', '=', 'registration_events.event_id')
            ->join('runners', 'runners.id', '=', 'registration_events.runner_id')
            ->join('users', 'users.id', '=', 'runners.user_id')
            ->select('users.surname as surname', 'users.name as name', 'registration_events.race_time as time', 'runners.country as country')
            ->where('marathons.id', '=', $marathon->id)
            ->orderBy('registration_events.race_time')
            ->where('events.event_type', '=', EventType::HALF_MARATHON)->get();

        $marathons42 = DB::table('marathons')
            ->join('events', 'marathons.id', '=', 'events.marathon_id')
            ->join('registration_events', 'events.id', '=', 'registration_events.event_id')
            ->join('runners', 'runners.id', '=', 'registration_events.runner_id')
            ->join('users', 'users.id', '=', 'runners.user_id')
            ->select('users.surname as surname', 'users.name as name', 'registration_events.race_time as time', 'runners.country as country')
            ->where('marathons.id', '=', $marathon->id)
            ->orderBy('registration_events.race_time')
            ->where('events.event_type', '=', EventType::MARATHON)->get();
        return view('race_result', ['marathons5' => $marathons5, 'marathons10' => $marathons10, 'marathons21' => $marathons21, 'marathons42' => $marathons42, 'marat' => $marat, 'eve' => $eve]);
    }
    public function regMarathon(string $slug, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $runner = Runner::query()
            ->where('user_id', Auth::id())
            ->first();

        if ($runner === null) {
            return redirect()->route('runner_reg');
        }

        $marathonId = Marathon::query()
            ->where('slug', $slug)
            ->get('id')
            ->first();

        if ($marathonId === null) {
            return abort(404);
        }

        $events = Event::query()
            ->where('marathon_id', $marathonId->id)
            ->where('event_type', $request->distance);
        if ($events === null) {
            return abort(404);
        }

        /*$check = RegistrationEvent::query()
            ->where('runner_id', $runner->id)
            ->where('event_id', $events->first()->id);

        if ($check !== null) {
            return redirect()
                ->route('list_marathons')
                ->with('success', 'Вы уже были зарегестрированы на этот марафон');
        }*/

        $reg_event = new RegistrationEvent();
        $reg_event->event_id = $events->first()->id;
        $reg_event->runner_id = $runner->id;
        $reg_event->save();

        return redirect()
            ->route('list_marathons')
            ->with('success', 'Вы зарегестрированы на марафон');
    }
}
