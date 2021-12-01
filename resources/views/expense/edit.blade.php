@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expenses</title>
<style>
    .filterborder {
        border: none;
    }

    .filterborder:nth-child(2) {
        color: black;
    }

    .filterborder:nth-child(4) {
        color: green;
    }

    .filterborder:nth-child(6) {
        color: red;
    }

    .type {
        margin-left: 10px;
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
        margin-left: 15px;
    }

    .radio-filter input[type="radio"] {
        opacity: 0;
        width: 0;
    }

    .radio-filter label {
        font-family: sans-serif, Arial;
        color: black;
        font-size: 16px;
    }

    .radio-filter input[type="radio"]:checked+label {
        background-color: white;
        color: black;
    }

    .filter {
        margin-left: 0px !important;
    }

    .paid {
        background-color: rgba(0, 128, 0, 0.1);
    }

    .unpaid {
        background-color: #ffcccb;
    }
</style>
<div class="borderblock"></div>

@if(Request::url() === "http://127.0.0.1:8000/expense/".$input->id."/edit")
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
        <div class="radio-filter">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <form action="" method="get" id="myForm" name="myForm" style="display:flex;">
                <input type="radio" id="radioAll" name="filter" value="All" onChange="autoSubmit();">
                <label class="filterborder" for="radioAll">all</label>
                /
                <input type="radio" id="radioPaid" class="filter type" name="filter" value="Paid" onChange="autoSubmit();">
                <label class="filterborder" for="radioPaid">paid</label>
                /
                <input type="radio" id="radioUnpaid" class="filter type" name="filter" value="Unpaid" onChange="autoSubmit();">
                <label class="filterborder" for="radioUnpaid">unpaid</label>
            </form>
            <script>
                function autoSubmit() {
                    var formObject = document.forms['myForm'];
                    formObject.submit();
                }
            </script>
            <?php
            if (!empty($_GET['filter'])) {
                $selected = $_GET['filter'];
            } else {
                $selected = 'All';
            }
            ?>
        </div>
        <a href="/expense/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        <div>
            <?php
            if (!empty($_GET['filter'])) {
                $selected = $_GET['filter'];
            } else {
                $selected = 'All';
            }
            if ($selected === "All") {
                echo '<p style="margin-left:15px; border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::all();
                foreach ($filters as $filter) {
                    if ($filter->status === "Paid") {
                        echo '<div class="spendinghover paid">';
                    } else if ($filter->status === "Unpaid") {
                        echo '<div class="spendinghover unpaid">';
                    }
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            if ($selected === "Paid") {
                echo '<p style="margin-left:15px;border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::where('status', 'Paid')->get(['name', 'id', 'amount']);
                foreach ($filters as $filter) {
                    echo '<div class="spendinghover paid">';
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            if ($selected === "Unpaid") {
                echo '<p style="margin-left:15px;border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::where('status', 'Unpaid')->get(['name', 'id', 'amount']);
                foreach ($filters as $filter) {
                    echo '<div class="spendinghover unpaid">';
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            ?>
        </div>




    </div>
    <div class="spendingsform">
        @foreach($spendings as $spending)
        @if ($spending->id != $input->id)
        @else
        <p class="formtitle">Edit</p>
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
            Status
            {{ $input->status }}
            <select class="spendingsinput selectmargin" name="status">
                @if($input->status === 'Unpaid')
                <option value="{{$input->status}}">{{ $input->status }}</option>
                <option value="Paid">Paid</option>
                @else
                <option value="{{$input->status}}">{{ $input->status }}</option>
                <option value="Unpaid">Unpaid</option>
                @endif
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