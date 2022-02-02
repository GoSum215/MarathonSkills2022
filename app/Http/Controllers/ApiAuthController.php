<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\Runner;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request) : JsonResponse {
        $request['login'] = strtolower($request['login']);
        $validator = Validator::make($request->all(), RegistrationRequest::rules());

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return response()->json(['message' => $messages], 422);
        }

        $validated = $validator->validated();
        $user = new User();
        $user->login = $validated['login'];
        $user->password = Hash::make($validated['password']);
        $user->name = $validated['name'];
        $user->surname = $validated['surname'];
        $user->email = $validated['email'];
        $user->role = Role::RUNNER;
        $user->save();

        $token = $user->createToken('token')->plainTextToken;

        $responce = [
            'token' => $token,
            'user' => $user,
            'runner' => null,
        ];

        return response()->json($responce, 201);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request) : JsonResponse {
        $request['login'] = strtolower($request['login']);
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:30',
            'password' => 'required|max:30'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            return response()->json(['message' => $messages], 422);
        }

        $validated = $validator->validated();

        if (!Auth::attempt(['login' => $validated['login'], 'password' => $validated['password']])) {
            return response()->json(['message' => 'Wrong login or password'], 422);
        }

        $user = User::query()
            ->where('login', $validated['login'])
            ->first();

        $runner = Runner::query()->where('user_id','=', $user->id)->first();

        $token = $user->createToken('token')->plainTextToken;
        $responce = [
            'token' => $token,
            'user' => $user, //new UserResource($user)
            'runner' => $runner,
        ];
        return response()->json($responce);
    }

    public function logout() : JsonResponse {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function profile() : JsonResponse {
        $user = Auth::user();
        return response()->json([new UserResource($user)]);
    }
}
