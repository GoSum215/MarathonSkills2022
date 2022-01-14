<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\RunnerRegRequest;
use App\Models\Runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RunnerRegController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('registration');
        }
        if ($request->isMethod('post')) {
            $validated = $request->validate(
                RunnerRegRequest::rules()
            );

            $runner = new Runner();
            $runner->gender = $validated['gender'];
            $runner->country = $validated['country'];
            $runner->date_of_birthday = $validated['date_of_birthday'];
            $runner->user_id = Auth::id();
            $runner->save();

            return redirect()
                ->route('list_marathons')
                ->with('success', 'Вы успешно зарегестрированы');
        }
        return view('runner_reg');
    }
}
