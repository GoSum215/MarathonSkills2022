<?php

namespace App\Http\Controllers;

use App\Enums\EventType;
use App\Http\Requests\MarathonRequest;
use App\Models\Event;
use App\Models\Marathon;
use Illuminate\Http\Request;

class AddMarathonController extends Controller
{
    public function create(Request $request)
    {
        return view('add_new_marathon');
    }

    /**
     * @throws \Exception
     */
    public function save(MarathonRequest $request)
    {
        $validated = $request->validate(
            MarathonRequest::rules()
        );
        $cost = $validated['cost'];

        $marathon = new Marathon();
        $marathon->marathon_name = $validated['marathon_name'];
        $marathon->country = $validated['country'];
        $marathon->city_name = $validated['city'];
        $marathon->country_id = 1;
        $marathon->description = $validated['description'];
        $marathon->date_start_marathon = $validated['date'];
        $marathon->cost = $cost;
        $marathon->save();

        $marathonId = Marathon::query()
            ->where('marathon_name', $validated['marathon_name'])
            ->value('id');

        if($validated['5km']) {
            $event = new Event();
            $event->cost = $cost;
            $event->marathon_id = $marathonId;
            $event->event_name = $validated['5km'];
            $event->event_type = EventType::SMALL_MARATHON;
            $event->max_participants = random_int(300, 500);
            $event->time_start_event = $validated['time5'];
            $event->save();
        }
        if($validated['10km']) {
            $event = new Event();
            $event->cost = $cost;
            $event->marathon_id = $marathonId;
            $event->event_name = $validated['10km'];
            $event->event_type = EventType::QUARTER_MARATHON;
            $event->max_participants = random_int(300, 500);
            $event->time_start_event = $validated['time10'];
            $event->save();
        }
        if($validated['21km']) {
            $event = new Event();
            $event->cost = $cost;
            $event->marathon_id = $marathonId;
            $event->event_name = $validated['21km'];
            $event->event_type = EventType::HALF_MARATHON;
            $event->max_participants = random_int(300, 500);
            $event->time_start_event = $validated['time21'];
            $event->save();
        }
        if($validated['42km']) {
            $event = new Event();
            $event->cost = $cost;
            $event->marathon_id = $marathonId;
            $event->event_name = $validated['42km'];
            $event->event_type = EventType::MARATHON;
            $event->max_participants = random_int(300, 500);
            $event->time_start_event = $validated['time42'];
            $event->save();
        }

        return redirect()
            ->route('add_marathon')
            ->with('success', 'Marathon created');
    }
}
