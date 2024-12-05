<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentHandler;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\StoreWebsite;

Route::post( 'payment/proccess', PaymentHandler::class );


Route::get('auth/google/callback', function (Request $request) {
    try {
        // Ambil credential dari URL query parameter
        $idToken = $request->credential;

        if (!$idToken) {
            return response()->json(['success' => false, 'error' => 'Credential not provided']);
        }

        // Validasi token dengan Google API
        $validationUrl = 'https://oauth2.googleapis.com/tokeninfo';
        $response = Http::get($validationUrl, ['id_token' => $idToken]);

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid ID token'
            ]);
        }

        $googleData = $response->json();

        Log::info(['data' => $googleData]);

        // Simpan atau perbarui pengguna
        $user = User::updateOrCreate(
            ['email' => $googleData['email']], // Pencarian berdasarkan email
            [
                'name' => $googleData['name'] ?? $googleData['email'],
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);
    

        // return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
});

