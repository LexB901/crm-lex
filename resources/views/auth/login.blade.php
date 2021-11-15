<title>Login</title>
<div class="indexbgc">
    <x-guest-layout>
        <div class="absolute top-0 right-0 flex justify-between left-0 p-4">
            <ul class="flex justify-around">
                <li class="inline-flex"><button class="text-md"><img src="/images/gb.svg" width="30"></button></li>
            </ul>
            <ul class="flex cursor-pointer">
                <li class="py-2 px-6 text-white bg-black-100">
                    ST.APE
                </li>
            </ul>
        </div>

        <div class="indeximgbox">
            <svg id="Group_26" data-name="Group 26" xmlns="http://www.w3.org/2000/svg" width="76.1" height="44.189" viewBox="0 0 76.1 44.189" class="indeximg">
                <path fill="black" id="Path_34" data-name="Path 34" d="M210.743,246.084c-.221-1.173-.07-4-.405-6.539a7.844,7.844,0,0,0-6.487-7.089c-1.54-.246-3.057-.637-4.578-.99s-3.051-.736-4.619-1.12a2.472,2.472,0,0,0-.643-.074,8.361,8.361,0,0,0-3.381.772,20.148,20.148,0,0,0-8.222,6.3c-.78,1.028-1.768,2.2-1.877,3.381-.406,4.424-1.019,8.834-.228,13.344a10.9,10.9,0,0,0,1.667,4.13c1.014,1.638,2.6,1.767,4.083,2.258a16.125,16.125,0,0,0,10.915-.163c2.382-.923,4.658-2.12,6.981-3.2.861-.4,2.055-.59,2.517-1.24,1.985-2.8,1.711-6.439,4.06-8.233C210.934,247.316,210.8,246.369,210.743,246.084Z" transform="translate(-179.918 -230.272)" fill="#e8e8e8" />
                <path fill="black" id="Path_35" data-name="Path 35" d="M288.623,315.3c1.283-.989,1.194-1.962.544-3.113-.737-1.3-1.27-2.722-1.961-4.055a4.38,4.38,0,0,0-5.162-2.244,3.671,3.671,0,0,1-1.759.014c-2.646-.741-4.141-.147-5.345,2.351-.6,1.243-.93,2.623-1.592,3.824-1.415,2.568-1.128,5.309-.417,7.827.674,2.384,1.483,5.217,4.629,5.665a32.241,32.241,0,0,0,6.55.3c3.486-.223,6.177-5.928,4.476-8.691l1.068-1.53Z" transform="translate(-243.055 -281.732)" fill="#e8e8e8" />
                <path fill="black" id="Path_36" data-name="Path 36" d="M353.852,246.646l-1.586-5.056c-.247-.631-.856-.457-1.2.221l-.047-.06a1.28,1.28,0,0,1-.276-.792l0-4a.335.335,0,0,0-.092-.211c-3.155-3.295-7.236-4.381-11.9-3.746-1.612.219-3.22.467-4.834.661-2.435.292-4.928.659-6.451,2.786-1.407,1.964-2.95,3.942-2.807,6.659a8.669,8.669,0,0,1-.677,2.946c-.723,2.243-.887,4.293,1.145,6.066a4.621,4.621,0,0,1,.937,2.2c.335,1.21.414,2.507.864,3.665.593,1.529,1.887,1.736,3.369.966a1.9,1.9,0,0,1,1.73.251,15.9,15.9,0,0,0,7.273,3.73c3.527.876,7.055,1.108,10.43-.534a5.577,5.577,0,0,0,2.434-2.035l.031-.037h0S354.9,249.453,353.852,246.646Z" transform="translate(-277.993 -232.019)" fill="#e8e8e8" />
            </svg>

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
        <footer>
            <style>
                .footer {
                    font-size: 1rem;
                    color: black;
                    width: 100%;
                }
            </style>
            <div class="footer">
                <p class="pfooter">Copyright © 2021 Weetjes TM, Inc.</p>
            </div>
        </footer>
    </x-guest-layout>
</div>