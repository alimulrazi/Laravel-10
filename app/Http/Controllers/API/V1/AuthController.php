<?php

namespace App\Http\Controllers\API\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\RefreshToken;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['name'])
        ]);
        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'status' => 'success',
            'message' => 'The user is registered successfully.',
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    // public function login(Request $request): JsonResponse
    // {
    //     $data = [];
    //     $fields = $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string'
    //     ]);

    //     if (!Auth::attempt($request->only(['email', 'password']))) {
    //         return $this->error('', 'Credentials do not match', 401);
    //     }

    //     // check email;
    //     $user = User::where('email', $fields['email'])->first();

    //     if (!$user || !Hash::check($fields['password'], $user->password)) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Invalid Credentials'
    //         ], 401);
    //     }

    //     $data['token'] = $user->createToken($request->email)->plainTextToken;
    //     $data['user'] = $user;

    //     $response = [
    //         'status' => 'success',
    //         'message' => 'User is logged in successfully.',
    //         'data' => $data,
    //     ];

    //     return response()->json($response, 201);
    // }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Access Token (short-lived)
        $accessToken = $user->createToken('access-token', ['*'])->plainTextToken;

        // Refresh Token (store in DB)
        $refreshToken = Str::random(64);
        RefreshToken::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $refreshToken),
            'expires_at' => Carbon::now()->addDays(7), // 7-day validity
        ]);

        return response()->json([
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken,
            'tokenType' => 'Bearer',
            'expiresIn' => 900 // 15 minutes
        ]);
    }

    public function refresh(Request $request) {
        $request->validate([
            'refreshToken' => 'required|string'
        ]);

        $hashedToken = hash('sha256', $request->refreshToken);

        $storedToken = RefreshToken::where('token', $hashedToken)->first();

        if (!$storedToken || $storedToken->expires_at->isPast()) {
            return response()->json(['message' => 'Invalid or expired refresh token'], 401);
        }

        $user = $storedToken->user;

        // Issue new access token
        $accessToken = $user->createToken('access-token', ['*'])->plainTextToken;

        return response()->json([
            'accessToken' => $accessToken,
            'tokenType' => 'Bearer',
            'expiresIn' => 900 // 15 minutes
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        // auth()->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
        ], 200);
    }
}
