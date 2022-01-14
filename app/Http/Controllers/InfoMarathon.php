<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Marathon;
use App\Models\RegistrationEvent;
use App\Models\Runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function getDetails(string $slug)
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

        return view('info_about_marathon', ['marathon' => $marathon, 'eve' => $eve, 'slug' => $marathon->slug]);
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
