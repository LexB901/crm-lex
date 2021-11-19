@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expenses</title>
<style>
    .selectborder {}

    .type {
        padding: 10px;
        margin-left: 10px;
        border: solid 1px black;
        background-color: black;
        color: white;
        height: 20px;
    }

    .selectmargin {
        margin: 1px;
    }

    .radio-filter {
        display: flex;
        flex-direction: row;
        padding: 3px;
        margin-left: 15px;
        margin-bottom: 30px;
    }

    .radio-filter input[type="radio"] {
        opacity: 0;
        width: 0;
    }

    .radio-filter label {
        padding: 10px;
        font-family: sans-serif, Arial;
        color: black;
        font-size: 16px;
        border-radius: 0px;
    }

    .radio-filter input[type="radio"]:checked+label {
        background-color: white;
        color: black;
    }
</style>
<div class="borderblock"></div>
@if(Request::url() === "http://127.0.0.1:8000/expense/create")
<style>
    .currentnav2 {
        background-color: rgb(0, 0, 0, .3);
    }
</style>
@endif
<div class="cursor-pointer mr-2 relative flex space-x-2 items-center">
    <a href="{{ url()->previous() }}">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="headerbackimg">
            <path fill="currentColor" d="M459.5 71.41l-171.5 142.9v83.45l171.5 142.9C480.1 457.7 512 443.3 512 415.1V96.03C512 68.66 480.1 54.28 459.5 71.41zM203.5 71.41L11.44 231.4c-15.25 12.87-15.25 36.37 0 49.24l192 159.1c20.63 17.12 52.51 2.749 52.51-24.62v-319.9C255.1 68.66 224.1 54.28 203.5 71.41z" class=""></path>
        </svg>
    </a>
</div>
<div class="spendingspage">

    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/expense/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        @foreach($spendings as $spending)
        <div class="spendinghover">
            <a href="{{route('expense.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->name }}</a>
            <a href="{{route('expense.edit',$spending->id)}}" style="display:flex;justify-content:right;margin-right:15px;text-decoration:none;">€{{ $spending->amount }}</a>
            <a href="{{route('expense.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->id }}</a>
        </div>
        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"".$spending['id']."/delete"}}" class="spendingid deletespending">Delete</a>

        @endforeach
    </div>
    <div class="spendingsform">
        <p class="formtitle">Create</p>
        <form id="spendform" action="/expenses" method="post" enctype="multipart/form-data">
            @csrf
            Name<br>
            <input value="expense" class="spendingsinput" type="text" name="name"><br>
            @if($errors->has('name'))
            <div class="caterror">{{ $errors->first('name') }}</div>
            @endif
            Date<br>
            <input value="2021-12-12" type="date" name="date" class="spendingsinput" format="d/m/Y">
            @if($errors->has('date'))
            <div class="caterror">{{ $errors->first('date') }}</div>
            @endif
            Projects<br>
            <select name="project" class="spendingsinput selectmargin">
                <option value="1">Project 1</option>

                @foreach($projects as $project)

                <option value="{{$project->id}}">{{$project->project}}</option>

                @endforeach
            </select>
            Currencies
            <select class="spendingsinput selectmargin" name="currency" id="currencylist"><br>
                <option value="EUR">EUR</option>
            </select>
            Status
            <select class="spendingsinput selectmargin" name="status">
                <option value="Unpaid">Unpaid</option>
                <option value="Paid">Paid</option>
            </select>
            Notes<br>
            <input value="no notes" class="spendingsinput notesinput" type="text" name="note"><br>
            <input class="fileinput " type="file" name="file" accept="application/pdf" placeholder="Drop a file" onchange="loadFile(event)"><br>
            @if($errors->has('file'))
            <div class="caterror">{{ $errors->first('file') }}</div>
            @endif
        </form>

    </div>
    <div class="pdfcontainer">
        <div class="radio-toolbar">

            <input type="radio" id="radioINK" name="type" value="INK" form="spendform" checked>
            <label class="selectborder" for="radioINK">INK</label>

            <input type="radio" id="radioVRK" class="type" name="type" value="VRK" form="spendform">
            <label class="selectborder" for="radioVRK">VRK</label>

            <input type="radio" id="radioCNT" class="type" name="type" value="CNT" form="spendform">
            <label class="selectborder" for="radioCNT">CNT</label>

        </div>

        <p><embed class="fileoutput" id="output" /></p>
        <script>
            let loadFile = function(event) {
                let file = document.getElementById('output');
                file.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>

    </div>
</div>
<div class="total">
    <input style="bottom:10px;z-index:30" class="saveinput" type="submit" value="SAVE" form="spendform">
    <div class="amount">
        TOTAL: €
        <input value="10" type="number" name="amount" form="spendform">
    </div>
</div>
<script>
    let currencies = ["AFA", "ALL", "DZD", "AOA", "ARS", "AMD", "AWG", "AUD", "AZN", "BSD", "BHD", "BDT", "BBD", "BYR", "BEF", "BZD", "BMD", "BTN", "BTC", "BOB", "BAM", "BWP", "BRL", "GBP", "BND", "BGN", "BIF", "KHR", "CAD", "CVE", "KYD", "XOF", "XAF", "XPF", "CLP", "CNY", "COP", "KMF", "CDF", "CRC", "HRK", "CUC", "CZK", "DKK", "DJF", "DOP", "XCD", "EGP", "ERN", "EEK", "ETB", "FKP", "FJD", "GMD", "GEL", "DEM", "GHS", "GIP", "GRD", "GTQ", "GNF", "GYD", "HTG", "HNL", "HKD", "HUF", "ISK", "INR", "IDR", "IRR", "IQD", "ILS", "ITL", "JMD", "JPY", "JOD", "KZT", "KES", "KWD", "KGS", "LAK", "LVL", "LBP", "LSL", "LRD", "LYD", "LTL", "MOP", "MKD", "MGA", "MWK", "MYR", "MVR", "MRO", "MUR", "MXN", "MDL", "MNT", "MAD", "MZM", "MMK", "NAD", "NPR", "ANG", "TWD", "NZD", "NIO", "NGN", "KPW", "NOK", "OMR", "PKR", "PAB", "PGK", "PYG", "PEN", "PHP", "PLN", "QAR", "RON", "RUB", "RWF", "SVC", "WST", "SAR", "RSD", "SCR", "SLL", "SGD", "SKK", "SBD", "SOS", "ZAR", "KRW", "XDR", "LKR", "SHP", "SDG", "SRD", "SZL", "SEK", "CHF", "SYP", "STD", "TJS", "TZS", "THB", "TOP", "TTD", "TND", "TRY", "TMT", "UGX", "UAH", "AED", "UYU", "USD", "UZS", "VUV", "VEF", "VND", "YER", "ZMK"];
    let sel = document.getElementById('currencylist');
    for (let i = 0; i < currencies.length; i++) {
        let opt = document.createElement('option');
        opt.innerHTML = currencies[i];
        opt.value = currencies[i];
        sel.appendChild(opt);
    }
</script>
@endsection