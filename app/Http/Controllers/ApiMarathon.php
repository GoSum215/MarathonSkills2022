<?php

namespace App\Http\Controllers;

use App\Models\Marathon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiMarathon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Marathon[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Marathon::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|JsonResponse|\Illuminate\Http\Response|object
     */
    public function show(string $slug)
    {
        $marathon = Marathon::query()->where('slug', $slug)->first();
        if($marathon === null) {
            abort(404);
        }
        return $marathon;
    }
}
