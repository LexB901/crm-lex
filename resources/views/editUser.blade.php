@extends('layouts.themalogin')

@section('content')
<title>Edit User</title>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/updateUser" style="width:100%">
            @csrf

            <input type="hidden" name="id" value="{{$input['id']}}">
            <!-- Name -->
            <div>
                <x-label class="tt" for="name" :value="__('Wijzig de naam:')" />
                <x-input value="{{$input['name']}}" id="name" class="block mt-1 w-full" type="text" name="name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label class="tt" for="email" :value="__('Wijzig het eimailadres:')" />
                <x-input value="{{$input['email']}}" id="email" class="block mt-1 w-full" type="email" name="email" />
            </div>

            <!-- Password -->
            <!-- <div class="mt-4">
                <x-label for="password" :value="__('Wijzig het wachtwoord:')" />
                <x-input value id="password" class="block mt-1 w-full" type="text" name="password"/>
            </div> -->
            <div class="mt-4">
                <x-label class="tt" for="status" :value="__('Wijzig de status:')" />
                <select name="banned" class="select" style="width: 100%;">



                    @foreach($statuses as $item)

                    @if($status->id == $item['id'])
                    <option value="{{$item->id}}" selected>{{$item->status}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->status}}</option>
                    @endif



                    @endforeach




                </select>
            </div>
            <div class="flex items-center justify-end mt-4">


                <x-button class="mt-4">
                    {{ __('Wijzig gebruiker') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection