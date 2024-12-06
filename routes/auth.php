<?php

use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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

Route::get('/auth/google/callback', function () {
    $userGoogle = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate(
        ['email' => $userGoogle->getEmail()],  // Kondisi pencarian berdasarkan email
        [
            'name' => $userGoogle->getName(),
            'email_verified_at' => Carbon::now(),   // Tandai sebagai email terverifikasi
        ]
    );

    Auth::login($user);
    
    return session()->has('url.intended') ? redirect(session('url.intended')) : redirect()->route('product');
});


