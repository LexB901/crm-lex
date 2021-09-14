@extends('layouts.themalogin')

@section('content')
<style>
    body {
        font-family: "Avenir Next", "Avenir", sans-serif
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="logo">
        <a href="https://www.flirtcreativity.com/nl/" target="_blank"><img style="display:inline;" src="/images/flirtlogo.png"></a>
    </div>



</x-app-layout>

@endsection