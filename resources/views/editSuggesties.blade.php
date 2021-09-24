@extends('layouts.themalogin')

@section('content')

<title>Weetjes</title>

<style>
    .bg-white {
        width: 35%;
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-top: 200px;
    }

    .mt-1 {
        padding-left: 7px;
    }

    .select {
        border-radius: 5px;
    }
</style>
<title>Edit Weetje</title>
<x-guest-layout>
    <div class="mb-4">
        <div class="bg-white">
            <form action="/updateSuggestie" method="post" style="width:90%;">
                @csrf
                <input type="hidden" name="id" value="{{$input['id']}}">
                <div class="tt">Titel:</div>
                <input style="border-radius: 5px;" value="{{ $input['suggestietitle'] }}" type=" text" class="block mt-1 w-full" type="email" name="suggestietitle" placeholder="Vul hier de titel van de suggestie in.">
                <div class="mt-4 tt">
                    Weetje:
                    <input style="border-radius: 5px;" value="{{ $input['suggestie'] }}" type=" text" class="block mt-1 w-full" type="email" name="suggestie" placeholder="Vul hier uw suggestie in.">
                </div><br>
                <a class="flex items-center justify-end mt-4" onclick="return confirm('Weet u zeker dat u deze suggestie wilt wijzigen?')">
                    <x-button>
                        {{ __('Suggestie wijzigen') }}
                    </x-button>
                </a>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-succes">
                <p>{{\Session::get('succes')}}</p>
            </div>
            @endif
        </div>
    </div>

</x-guest-layout>

@endsection