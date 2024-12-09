<?php

use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

Route::get('auth/logout', function(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();

    return redirect('/'); // Redirect ke halaman utama setelah logout
})->name('logout.get'); 


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-login');

Route::post('/auth/google/callback', function (Request $request) {
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

        // Simpan atau perbarui pengguna
        $user = User::updateOrCreate(
            ['email' => $googleData['email']], // Pencarian berdasarkan email
            [
                'name' => $googleData['name'] ?? $googleData['email'],
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        $url = Cache::get('product_url', route('product'));

        if(cache()->has('product_id')){
            $user->carts()->updateOrCreate(
                // Kondisi pencocokan
                [ 'product_id' => Cache::get('product_id') ],
                // Data yang akan diupdate atau dibuat
                [ 'quantity' => DB::raw( 'quantity + 1' ) ]
            );
        }



        return redirect()->intended($url);
    
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
});


