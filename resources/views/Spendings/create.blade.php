<script>

</script>
<style>
    .plussvg {
        height: 1em;
        position: absolute;
        right: 5px;
        top: 10px;
    }
</style>
<link rel="stylesheet" href="/css/style.css">
<div class="borderblock"></div>
<div class="navspendings">
    <div class="navspendbox">
        @if(Request::url() === 'http://localhost:8000/Spendings/create')
        <style>
            .currentnav1 {
                background-color: rgb(0, 0, 0, .3);
            }
        </style>
        @endif
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext currentnav1" href="/Spendings">Expenses</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Home">Home</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/WeetjesForm">Weetje Toevoegen</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Alle-Weetjes">Alle Weetjes</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Mijn-Rollen">Mijn Rollen</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;border:none;" class="navspendtext" href="/Admin-Nav">Admin Panel</a><br>
        </div>
    </div>
</div>
<div class="spendingspage">
    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/Spendings/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>

        @foreach($spendings as $spending)
        <div class="spendinghover">
            <a href="{{route('Spendings.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->name }}</a>
            <a href="{{route('Spendings.edit',$spending->id)}}" style="display:flex;justify-content:right;margin-right:15px;text-decoration:none;">€{{ $spending->amount }}</a>
            <a href="{{route('Spendings.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->id }}</a>
        </div>
        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"Spendings/".$spending['id']."/delete"}}" class="spendingid deletespending">Delete</a>

        @endforeach
    </div>
    <div class="spendingsform">
        <form id="spendform" action="/Spendings" method="post" enctype="multipart/form-data">
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