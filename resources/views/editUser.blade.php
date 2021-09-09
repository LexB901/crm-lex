@extends('layouts.themalogin')

@section('content')
<title>Registreer</title>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/updateUser">
            @csrf

            <input type="hidden" name="id" value="{{$input['id']}}">
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Vul uw naam in:')" />

                <x-input value="{{$input['name']}}" id="name" class="block mt-1 w-full" type="text" name="name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Vul uw email in:')" />
                <x-input value="{{$input['email']}}" id="email" class="block mt-1 w-full" type="email" name="email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Vul je wachtwoord in:')" />
                <x-input id="password" class="block mt-1 w-full" type="text" name="password" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Wijzig gebruiker') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection