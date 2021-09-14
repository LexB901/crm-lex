@extends('layouts.themalogin')

@section('content')

<title>Weetjes</title>

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
            <form action="/post" method="post" style="width:90%;">

                @csrf
                <input style="border-radius: 5px;" type="text" class="block mt-1 w-full" type="email" name="title" placeholder="Vul hier de titel van het weetje in." required autofocus value="autotitel">
                <div class="mt-4">
                    <input style="border-radius: 5px;" type="text" class="block mt-1 w-full" type="email" name="weetje" placeholder="Vul hier uw weetje in." value="autotitel">
                </div><br>
                <div class="form-group">
                    <label for="name">Categorie</label>

                    <select name="categorie" class="select">
                        <option selected disabled value="">Selecteer een categorie</option>

                        @foreach($categories as $categorie)

                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>

                        @endforeach
                    </select>
                </div>
                {{-- <select name="categorie" class="select">--}}
                {{-- <option selected disabled value="">Selecteer een categorie</option>--}}
                {{-- <option value="Sport">Sport</option>--}}
                {{-- <option value="Autos">Autos</option>--}}
                {{-- <option value="Kunst">Kunst</option>--}}
                {{-- <option value="Natuur">Natuur</option>--}}
                {{-- <option value="Techniek">Techniek</option>--}}
                {{-- <option value="Eten">Eten</option>--}}
                {{-- <option value="Transport">Transport</option>--}}
                {{-- </select>--}}
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Verstuur weetje') }}
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