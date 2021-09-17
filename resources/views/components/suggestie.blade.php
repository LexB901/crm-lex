<style>
    .suggestie {
        display: flex;
        justify-content: right;
    }

    .bg-white {
        width: 30%;
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2%;
        padding-bottom: 2%;
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
    }

    .mt-1 {
        margin-top: 0.25rem;
    }
</style>
<div style="justify-content:right;" class="suggestie">
    <div style="margin-top: 200px;" class="bg-white">
        <form id="suggestieformulier" action="/suggestie" method="post" style="width:90%;">

            @csrf

            <textarea style="width: 100%;" rows="1" cols="62" name="suggestietitle" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard titel voor de suggestie :)</textarea>
            <div class="mt-4">
                <textarea style="width: 100%;" rows="4" cols="62" name="suggestie" class="block mt-1 w-full" wrap="hard" placeholder="Vul hier uw weetje in.">Dit is een standaard text voor de suggestie :)</textarea>
            </div><br>


            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Verstuur suggestie') }}
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