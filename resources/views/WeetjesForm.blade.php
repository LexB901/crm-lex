@extends('layouts.themalogin')

@section('content')

<title>Weetjes</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
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

    .dropdown-menu {
        padding: 0px;
        width: 27%;
    }

    .next {
        display: flex;
        justify-content: right;
    }

    .datepicker-switch {
        text-align: center;
    }

    .dow {
        text-align: center;
    }

    .container {
        padding-left: 0px;
        padding-right: 0px;
    }

    .form-control {
        cursor: default;
    }

    @media (min-width: 200px) {
        .container {
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .container {
            width: 100%;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 100%;
        }
    }

    .day:hover {
        cursor: default;
        background-color: #636B6F;
    }
</style>

<div class="mb-4">
    <div style="margin-top: 200px; width: 30%;" class="bg-white">
        <form action="/Form" method="post" style="width:90%;">

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
                <p class="tt"><label style="font-weight:0;" for="name">Categorie:</label></p>

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
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

                <div class="container">
                    <input name="date" id="datepicker" class="date form-control" type="text" readonly>
                </div>

                <script type="text/javascript">
                    $('.date').datepicker({
                        format: 'yyyy-mm-dd'
                    });
                </script>

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