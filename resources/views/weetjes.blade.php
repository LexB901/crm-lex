@extends('layouts.themalogin')

@section('content')

<title>Weetjes</title>

<style>
    .bg-white {
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 1%;
        padding-bottom: 1%;
        background-color: #557a95;
        border-radius: 20px;
    }

    .select {
        border-radius: 7px;
        padding-top: 4px;
        padding-bottom: 4px;
    }

    .mb-4 {
        justify-content: center;
        margin-top: 200px;
    }

    .mt-4 {
        padding-right: 11px;
    }

    #text2 {
        display: none;
        color: red;
        font-weight: 200;
        font-weight: bold;
    }

    .caterror {
        display: block;
        color: red;
        font-weight: 200;
        font-weight: bold;
    }
</style>

<div class="mb-4">
    <div style="margin-top: 200px; width: 30%;" class="bg-white">
        <form action="/post" method="post" style="width:90%;">

            @csrf
            <div class="mt-4">
                <p class="tt">Titel:</p>
                <textarea style="width: 100%; padding-left:7px" id="myInput3" rows="1" cols="62" name="title" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard text voor de titel :)</textarea>
            </div>
            <div class="mt-4">
                <p class="tt">Weetje:</p>
                <textarea style="width: 100%; padding-left:7px;" id="myInput4" rows="4" cols="62" name="weetje" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard text voor het weetje :)</textarea>
            </div>
            <div class="form-group">
                <p class="tt"><label for="name">Categorie:</label></p>

                <select style="width: 100%;" name="categorie" class="select">
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
            <div>
                <br>
                <p id="text2">LET OP! Capslock staat aan.</p>
                <x-button id="knop">
                    {{ __('Verstuur weetje') }}
                </x-button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="caterror">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>

    @if(\Session::has('success'))
    <div class="alert alert-succes">
        <p>{{\Session::get('succes')}}</p>
    </div>
    @endif
</div>




@endsection