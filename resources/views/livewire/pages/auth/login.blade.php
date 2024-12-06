<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Masmerise\Toaster\Toaster;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended();
    }
}; ?>

@section('page-title', 'Login')

<div>
    <div class="w-full mb-4 flex justify-center">


        {{-- <div id="g_id_onload" data-client_id="{{ config('services.google.client_id') }}" data-context="signin" data-ux_mode="popup"
            data-login_uri="auth/google/callback" data-itp_support="true">
        </div>

        <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="filled_black"
            data-text="continue_with" data-size="large" data-logo_alignment="left">
        </div> --}}

        <div id="g_id_onload" data-client_id="{{ config('services.google.client_id') }}" data-context="signin" data-ux_mode="redirect" data-login_uri="auth/google/callback"
            data-itp_support="true">
        </div>

        <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="filled_blue"
            data-text="signin_with" data-size="large" data-logo_alignment="left">
        </div>


        {{-- <a href="{{ route('google-login') }}" class="px-4 py-3 border text-sm flex justify-center gap-2 rounded w-full">
            <img class="w-5 h-5" src="{{ asset('google.svg') }}" loading="lazy" alt="google logo">
            <span>Lanjutkan Dengan Google</span>
        </a> --}}
    </div>


    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div class="space-y-3">
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                    name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />

                <div class="w-full flex justify-end mt-1">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Lupa password?') }}
                        </a>
                    @endif

                </div>
            </div>

            <!-- Password -->
            <div class="">
                <x-input-label for="password" :value="__('Password')" class="-mt-3" />

                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="w-full">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                </label>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 text-center">Belum punya akun?
                        Daftar </a>



                    <x-primary-button class="ms-3 w-[6rem] flex justify-center">

                        <div class="w-full" wire:loading.remove>
                            {{ __('Masuk') }}
                        </div>

                        <div role="status" wire:loading wire.target="login" class="w-full">
                            <svg aria-hidden="true" class="inline w-4 h-4 text-gray-200 animate-spin fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </x-primary-button>
                </div>
            </div>

        </div>
    </form> --}}
</div>
