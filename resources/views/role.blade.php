@extends('layouts.themalogin')

@section('content')
<style>
    .bg-white {
        width: 50%;
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

<x-guest-layout>
    <div class="mb-4">
        <div class="bg-white">
            <form action="/role2" method="post" style="width:90%;">

                @csrf
                <label for="name">Selecteer een rol</label>
                <input type="hidden" name="name">
                <select name="role" class="select">
                    <!-- <option selected disabled value="">Selecteer een categorie</option> -->

                    @foreach($roles as $role)

                    <option value="{{$role->id}}">{{$role->role}}</option>

                    @endforeach
                </select>

                {{-- <select name="role" class="select">--}}
                <!-- {{-- <option selected disabled value="">Selecteer een categorie</option>--}} -->
                {{-- <option value="Donateur">Donateur</option>--}}
                {{-- <option value="Supporter">Supporter</option>--}}
                {{-- <option value="Lid">Lid</option>--}}
                {{-- <option value="Leider">Leider</option>--}}
                {{-- <option value="Administrator">Administrator</option>--}}
                {{-- <option value="Moderator">Moderator</option>--}}
                {{-- <option value="Helper">Helper</option>--}}
                {{-- </select>--}}
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Verstuur Rol') }}
                    </x-button>
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