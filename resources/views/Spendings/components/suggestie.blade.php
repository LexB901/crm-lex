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

    .mb-4 {
        margin-bottom: 1rem;
        display: flex;
        width: 100%;
        align-items: center;
    }

    .justify-end {
        justify-content: flex-end;
    }

    .tracking-widest {
        letter-spacing: 0.1em;
    }

    .block {
        display: block;
        color: black;
    }

    .mt-1 {
        margin-top: 0.25rem;
    }

    .qmark {
        display: block;
        position: fixed;
        bottom: 20px;
        height: 50px;
        width: 50px;
    }

    .suggestie {
        opacity: 0;
        justify-content: right;
        position: fixed;
        bottom: 150px;
        right: -600px;
        transition-duration: 1s;
    }

    .hidden {
        opacity: 1;
        right: 50px;

    }

    #demo2 {
        position: fixed;
        width: 50px;
        height: 50px;
        bottom: 30px;
        right: 50px;
        display: block;
        z-index: 20;
        transition-duration: 0.5s;
    }

    #demo2 {
        background: url(/images/feedback.svg);
    }

    #demo2:hover {
        width: 100px;
        height: 100px;

    }

    .tt {
        margin: 0px;
        padding: 0px;
        color: white;
    }

    #knop {
        width: 100%;
        margin-top: 10px;
        background-color: #1f2937;
        color: white;
        border-color: transparent;
    }

    #text {
        display: none;
        color: red;
        font-weight: 200;
        font-weight: bold;
    }
</style>

<div style="justify-content:right;" class="suggestie">
    <div class="bg-white" style="padding-top:20px;padding-bottom:20px">
        <form id="suggestieformulier" action="/Suggesties" method="get" style="width:90%;">

            @csrf
            <div class="mt-4">
                <p class="tt">Onderwerp:</p>
                <textarea style="width: 100%;padding-left:7px;" id="myInput" rows="1" cols="62" name="suggestietitle" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier het onderwerp in.">Standaard titel voor suggesties :)</textarea>

            </div>
            <div class="mt-4">
                <p class="tt">Suggestie:</p>
                <textarea style="width: 100%;padding-left:7px;" id="myInput2" rows="4" cols="62" name="suggestie" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier de suggestie in.">Dit is een standaard text voor de suggestie :)</textarea>
            </div><br>

            <p id="text">LET OP! Capslock staat aan.</p>

            <x-button id="knop">
                {{ __('Verstuur suggestie') }}

            </x-button>

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
<span id="demo2"></span>