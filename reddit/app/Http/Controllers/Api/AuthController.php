<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // 🔹 Реєстрація користувача
    public function register(Request $request)
    {
//        dd($request);
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|min:6',
//        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $apiKey = ApiKey::create([
            'user_id' => $user->id,
            'api_key' => ApiKey::generateKey(),
        ]);

        return response()->json([
            'user' => $user,
            'api_key' => $apiKey,
//            'token' => $user->createToken('auth_token')->plainTextToken,
        ], 201);
    }

    // 🔹 Логін користувача
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => 'Неправильний email або пароль']);
        }

        return response()->json([
            'user' => $user,
//            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    // 🔹 Вихід (Logout)
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Вихід виконано']);
    }
}

