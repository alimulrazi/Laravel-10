<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\RefreshToken;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }

    public function login(Request $request) {
        dd($request);
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

    public function logout(Request $request) {
        // Revoke current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
