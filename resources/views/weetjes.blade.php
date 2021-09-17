@extends('layouts.themalogin')

@section('content')

<title>Weetjes</title>

<style>
    .bg-white {
        width: 30%;
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2%;
        padding-bottom: 2%;
    }
</style>

<div class="mb-4">
    <div style="margin-top: 200px;" class="bg-white">
        <form action="/post" method="post" style="width:90%;">

            @csrf

            <textarea style="width: 100%;" rows="1" cols="62" name="title" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard text voor de titel :)</textarea>
            <div class="mt-4">
                <textarea style="width: 100%;" rows="4" cols="62" name="weetje" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard text voor het weetje :)</textarea>
            </div><br>
            <div class="form-group">
                <label for="name">Categorie</label>

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
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Verstuur weetje') }}
                </x-button>
            </div>
        </form>
    </div>
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




@endsection