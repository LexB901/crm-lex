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
            <form action="/update" method="post" style="width:90%;">
                @csrf
                <input type="hidden" name="id" value="{{$input['id']}}">
                <div class="tt">Titel:</div>
                <input style="border-radius: 5px;" value="{{ $input['title'] }}" type=" text" class="block mt-1 w-full" type="email" name="title" placeholder="Vul hier de titel van het weetje in.">
                <div class="mt-4 tt">
                    Weetje:
                    <input style="border-radius: 5px;" value="{{ $input['weetje'] }}" type=" text" class="block mt-1 w-full" type="email" name="weetje" placeholder="Vul hier uw weetje in.">
                </div><br>
                <div class="form-group">
                    <label class="tt" for="name">Categorie</label>
                    <?php
                    // dd($categorie);
                    ?>
                    <select name="categorie" class="select">



                        @foreach($categories as $item)

                        @if($categorie->id == $item['id'])
                        <option value="{{$item->id}}" selected>{{$item->categorie}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->categorie}}</option>
                        @endif



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

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

                <div class="container">
                    <input value="{{$input->date}}" name="date" id="datepicker" class="date form-control" type="text" readonly>
                </div>

                <script type="text/javascript">
                    $('.date').datepicker({
                        format: 'yyyy-mm-dd'
                    });
                </script>

                <a onclick="return confirm('Weet je zeker dat je dit weetje wilt wijzigen?')" class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Weetje wijzigen') }}
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