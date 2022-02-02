<?php

namespace App\Http\Controllers;

use App\Http\Requests\RunnerRegRequest;
use App\Models\Event;
use App\Models\Marathon;
use App\Models\RegistrationEvent;
use App\Models\Runner;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiRegRunnerController extends Controller
{
    public function add_runner(Request $request) : JsonResponse
    {
        //$user = Auth::user();
        $validator = Validator::make($request->all(), RunnerRegRequest::rules());

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return response()->json(['message' => $messages], 422);
        }

        $userid = Auth::id();
        if ($userid === null) $userid = User::inRandomOrder()->first()->id;

        $validated = $validator->validated();
        $runner = new Runner();
        $runner->gender = $validated['gender'];
        $runner->country = $validated['country'];
        $runner->date_of_birthday = $validated['date_of_birthday'];
        $runner->user_id = $userid;
        $runner->save();

        return response()->json($runner, 201);
    }

    public function reg_runner_marathon(Request $request, string $slug) : JsonResponse
    {
        $runner = Runner::query()
            ->where('user_id', Auth::id())
            ->first();

        if ($runner === null) {
            //return response()->json(['message' => 'You are not registered as a runner'], 422);
            $runner = Runner::inRandomOrder()->first();
        }

        $marathonId = Marathon::query()
            ->where('slug', $slug)
            ->get('id')
            ->first();

        if ($marathonId === null) {
            return response()->json(['message' => 'Marathon or Event not found'], 422);
        }

        $events = Event::query()
            ->where('marathon_id', $marathonId->id)
            ->where('event_type', $request->distance);
        if ($events === null) {
            return response()->json(['message' => 'Marathon or Event not found'], 422);
        }

        $reg_event = new RegistrationEvent();
        $reg_event->event_id = $events->first()->id;
        $reg_event->runner_id = $runner->id;
        $reg_event->save();

        return response()->json($reg_event);
    }
}
