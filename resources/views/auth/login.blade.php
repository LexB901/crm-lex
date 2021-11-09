<title>Login</title>
<div class="indexbgc">
    <x-guest-layout>
        <div class="absolute top-0 right-0 flex justify-between left-0 p-4">
            <ul class="flex justify-around">
                <li class="inline-flex"><button class="text-md"><img src="/images/countries/en.svg" width="30"></button></li>
            </ul>
            <ul class="flex cursor-pointer">
                <li class="py-2 px-6 text-white bg-black-100">
                    ST.APE
                </li>
            </ul>
        </div>

        <div class="indeximgbox">
            <img src="https://crm.flirtserver.xyz/storage/1/stapelogo.svg" class="indeximg">

            <x-auth-card>
                <x-slot name="logo">

                </x-slot>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                @if (session('error'))
                <span class="text-danger"> {{session('error')}}</span>
                @endif


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <button class="indexformbutton">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
            </x-auth-card>
        </div>

    </x-guest-layout>
</div>