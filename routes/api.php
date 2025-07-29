<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

/* show all user */
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

/* login api */
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json([
        'user' => $user,
        'token' => $user->createToken('auth_token')->plainTextToken
    ]);
});

/* register api */
Route::post('/register', function (Request $request) {
    Log::info("register api done");
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'user' => $user,
        'token' => $user->createToken('auth_token')->plainTextToken
    ]);
});

/* show all services */
Route::middleware(['auth:sanctum'])->get('/services', [ServiceController::class, 'index']);

/* show service detail */
Route::middleware(['auth:sanctum'])->get('/services/{id}', [ServiceController::class, 'show']);

/* create service */
Route::middleware(['auth:sanctum'])->post('/services', [ServiceController::class, 'store']);

/* update service */
Route::middleware(['auth:sanctum'])->put('/services/{id}', [ServiceController::class, 'update']);

/* delete service */
Route::middleware(['auth:sanctum'])->delete('/services/{id}', [ServiceController::class, 'destroy']);

/* show all bookings */
Route::middleware(['auth:sanctum'])->get('/bookings', [BookingController::class, 'index']);

/* show booking detail */
Route::middleware(['auth:sanctum'])->get('/bookings/{id}', [BookingController::class, 'show']);

/* create new booking */
Route::middleware(['auth:sanctum'])->post('/bookings', [BookingController::class, 'store']);

