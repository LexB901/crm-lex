@extends('layouts.themalogin')

@section('content')
<style>
    .bg-white {
        width: 25%;
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2%;
        padding-bottom: 2%;
    }

    .select {
        border-radius: 5px;
    }
</style>
<title>Edit Role</title>
<x-guest-layout>
    <div class="mb-4">
        <div class="bg-white">
            <form action="/UpdateRole2" method="post" style="width:50%;">

                @csrf
                <label class="tt" for="name">Selecteer een rol</label><br>
                <input type="hidden" value="{{$allusers->id}}" name="id">

                @foreach($allroles as $allrole)
                <div class="tt">
                    <input type="checkbox" name="roles[]" value="{{$allrole->id}}" {{ $allrole->selected == 1 ? 'checked' : false }}> {{$allrole->role}}<br>
                </div>
                @endforeach

                <div class="flex items-center justify-end mt-4">
                    <a class="flex items-center justify-end mt-4" onclick="return confirm('Weet je zeker dat je deze gebruiker zijn rollen wilt bijwerken?')">
                        <x-button>
                            {{ __('Wijzig rollen') }}
                        </x-button>
                    </a>
                </div>
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