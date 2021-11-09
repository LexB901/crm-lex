@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expenses</title>

<div class="borderblock"></div>

@if(Request::url() === "http://localhost:8000/expense/".$input->id."/edit")
<style>
    .currentnav2 {
        background-color: rgb(0, 0, 0, .3);
    }
</style>
@endif

<div class="spendingspage">

    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/expense/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        <div>
            @foreach($spendings as $spending)


            @if ($spending->id != $input->id)
            <div class="spendinghover">
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingname" style="text-decoration:none;">{{ $spending->name }}</a>
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingamount" style="text-decoration:none;">€{{ $spending->amount }}</a>
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingid" style="text-decoration:none;">{{ $spending->id }}</a>
            </div>
            <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"/expense/".$spending['id']."/delete"}}" class="spendingid deletespending" style="text-decoration:none;">Delete</a>
            @else
            <div class="spendinghover togglespending">
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingname" style="text-decoration:none;">{{ $spending->name }}</a>
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingamount" style="text-decoration:none;">€{{ $spending->amount }}</a>
                <a href="{{route('expense.edit',$spending->id)}}" class="spendingid" style="text-decoration:none;">{{ $spending->id }}</a>
            </div>
            <a onclick="return confirm('Je kan de uitgave niet verwijderen, omdat je hem aan het wijzigen bent.')" class="spendingid deletespending" style="text-decoration:none">Delete</a>

            @endif

            @endforeach
        </div>




    </div>
    <div class="spendingsform">
        @foreach($spendings as $spending)
        @if ($spending->id != $input->id)
        @else

        <form id="spendform" action="/expense/{{$spending->id}}/update" method="post">
            @endif

            @endforeach

            <!-- enctype="multipart/form-data" -->
            @csrf
            Name<br>
            <input value="{{$input->name}}" class="spendingsinput" type="text" name="name"><br>
            @if($errors->has('name'))
            <div class="caterror">{{ $errors->first('name') }}</div>
            @endif
            Date<br>

            <input value="{{ date_format(date_create($input->date), "Y-m-d") }}" type="date" name="date" class="spendingsinput">
            @if($errors->has('date'))
            <div class="caterror">{{ $errors->first('date') }}</div>
            @endif
            Projects<br>
            <select name="project" class="spendingsinput selectmargin">

                @foreach($projects as $projecten)
                @if($project->id == $projecten['id'])
                <option value="{{$projecten->id}}" selected>{{$projecten->project}}</option>
                @else
                <option value="{{$projecten->id}}">{{$projecten->project}}</option>
                @endif

                @endforeach
            </select>
            Currencies
            <select class="spendingsinput selectmargin" name="currency" id="currencylist">
                <option name="currency" value="{{$input->currency}}">{{$input->currency}}</option>
            </select>

            Notes<br>
            <input value="{{$input->note}}" class="spendingsinput notesinput" type="text" name="note"><br>

        </form>

    </div>
    <div class="pdfcontainer">
        <div class="radio-toolbar">
            <input type="radio" id="radioINK" name="type" value="INK" {{ ($input->type=="INK")? "checked" : "" }} form="spendform">
            <label class="selectborder" for="radioINK">INK</label>

            <input type="radio" id="radioVRK" class="type" name="type" value="VRK" {{ ($input->type=="VRK")? "checked" : "" }} form="spendform">
            <label class="selectborder" for="radioVRK">VRK</label>

            <input type="radio" id="radioCNT" class="type" name="type" value="CNT" {{ ($input->type=="CNT")? "checked" : "" }} form="spendform">
            <label class="selectborder" for="radioCNT">CNT</label>
        </div>
        <p><embed class="fileoutput" id="output" src="{{asset('/storage/'.$input->file)}}"></p>
        <script>
            let loadFile = function(event) {
                let file = document.getElementById('output');
                file.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    </div>
</div>
<div class="total">
    <input style="bottom:10px;z-index:30" class="saveinput" type="submit" value="UPDATE" form="spendform">
    <div class="amount">
        TOTAL: €
        <input value="{{$input->amount}}" type="number" name="amount" form="spendform">
    </div>
</div>
<script>
    let currencies = ["AFA", "ALL", "DZD", "AOA", "ARS", "AMD", "AWG", "AUD", "AZN", "BSD", "BHD", "BDT", "BBD", "BYR", "BEF", "BZD", "BMD", "BTN", "BTC", "BOB", "BAM", "BWP", "BRL", "GBP", "BND", "BGN", "BIF", "KHR", "CAD", "CVE", "KYD", "XOF", "XAF", "XPF", "CLP", "CNY", "COP", "KMF", "CDF", "CRC", "HRK", "CUC", "CZK", "DKK", "DJF", "DOP", "XCD", "EGP", "ERN", "EEK", "ETB", "EUR", "FKP", "FJD", "GMD", "GEL", "DEM", "GHS", "GIP", "GRD", "GTQ", "GNF", "GYD", "HTG", "HNL", "HKD", "HUF", "ISK", "INR", "IDR", "IRR", "IQD", "ILS", "ITL", "JMD", "JPY", "JOD", "KZT", "KES", "KWD", "KGS", "LAK", "LVL", "LBP", "LSL", "LRD", "LYD", "LTL", "MOP", "MKD", "MGA", "MWK", "MYR", "MVR", "MRO", "MUR", "MXN", "MDL", "MNT", "MAD", "MZM", "MMK", "NAD", "NPR", "ANG", "TWD", "NZD", "NIO", "NGN", "KPW", "NOK", "OMR", "PKR", "PAB", "PGK", "PYG", "PEN", "PHP", "PLN", "QAR", "RON", "RUB", "RWF", "SVC", "WST", "SAR", "RSD", "SCR", "SLL", "SGD", "SKK", "SBD", "SOS", "ZAR", "KRW", "XDR", "LKR", "SHP", "SDG", "SRD", "SZL", "SEK", "CHF", "SYP", "STD", "TJS", "TZS", "THB", "TOP", "TTD", "TND", "TRY", "TMT", "UGX", "UAH", "AED", "UYU", "USD", "UZS", "VUV", "VEF", "VND", "YER", "ZMK"];
    let sel = document.getElementById('currencylist');
    for (let i = 0; i < currencies.length; i++) {
        let opt = document.createElement('option');
        opt.innerHTML = currencies[i];
        opt.value = currencies[i];
        sel.appendChild(opt);
    }
</script>