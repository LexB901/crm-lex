@extends('layouts.themalogin')

@section('content')
<style>
    body {
        background-color: #9FC1CB;
    }

    input {
        padding: 0px;
        margin: 0px;
    }

    select {
        margin: 1px;
    }

    p {
        padding: 0px;
        margin: 0px;
    }

    textarea {
        padding: 0px;
        padding: 0px;
    }

    .footer {
        background-color: #9FC1CB;
    }

    .spendingspage {
        display: flex;
        position: relative;
        width: 80vw;
        height: 800px;
        top: 10vh;
        left: 10vw;
    }

    .spendingsform {
        background-color: #E3E3E3;
        padding: 10px;
        box-sizing: content-box;
        border: 1px solid black;
        width: 250px;
        position: absolute;
    }

    #spendform {
        height: 330px
    }

    .pdfcontainer {
        display: flex;
        width: 100%;
    }

    .spendingsinput {
        width: 240px;
        border-radius: 0px;
        border-width: 1px;
        height: 28px;
        font-size: 1.2rem;
    }

    .fileoutput {
        position: absolute;
        right: 10vw;
        height: 600px;
        width: 66vw;
        left: 272px;
        top: 40px;
        padding-left: 20px;
        padding-top: 20px;
    }

    .notesinput {
        height: 44px;
    }

    .fileinput {
        margin-top: 10px;

    }

    .saveinput {
        border-radius: 0px;
        width: 60px;
        height: 30px;
        background: black;
        color: white;
        border: none;
        position: absolute;
        right: 230px;
        bottom: 490px;
    }

    .svg {
        width: 10px;
    }

    .date {
        width: 190px;
    }

    .datepicker:hover {
        cursor: default;
    }

    table {
        width: 10vw;

    }

    .type {
        padding: 10px;
        margin-right: 10px;
        border: solid 1px black;
        background-color: black;
        color: white;
        height: 20px;
    }

    .selectmargin {
        margin: 1px;
    }

    .radio-toolbar {
        position: absolute;
        left: 272px;
        display: flex;
        flex-direction: row;
        padding-left: 10px;
    }

    .radio-toolbar input[type="radio"] {
        opacity: 0;
        width: 0;
    }

    .radio-toolbar label {
        background-color: black;
        padding: 10px;
        font-family: sans-serif, Arial;
        color: white;
        font-size: 16px;
        border-radius: 0px;
    }

    .radio-toolbar input[type="radio"]:checked+label {
        background-color: white;
        border-color: black;
        color: black;
    }
</style>
<div class="spendingspage">
    <div class="spendingsform">
        <form id="spendform" action="/spend" method="post" enctype="multipart/form-data">
            @csrf
            Name<br>
            <textarea class="spendingsinput" type="text" name="name"></textarea><br>
            Date<br>
            <input type="date" name="date" class="spendingsinput">
            Projects<br>
            <select name="project" class="spendingsinput selectmargin">
                <option selected disabled value="">Selecteer een project</option>

                @foreach($projects as $project)

                <option value="{{$project->id}}">{{$project->project}}</option>

                @endforeach
            </select>
            Currencies
            <select class="spendingsinput selectmargin" name="currency" id="currencylist"><br>
                <option selected disabled value="">Selecteer een currency</option>
            </select>
            Notes<br>
            <textarea class="spendingsinput notesinput" type="text" name="note"></textarea><br>
            <input class="fileinput spendingsinput" type="file" name="file" accept="application/pdf" placeholder="Drop a file" onchange="loadFile(event)"><br>
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
    <div class="pdfcontainer">
        <div class="radio-toolbar">
            <input type="radio" id="radioINK" class="type" name="type" value="INK" checked form="spendform">
            <label for="radioINK">INK</label>

            <input type="radio" id="radioVRK" class="type" name="type" value="VRK" form="spendform">
            <label for="radioVRK">VRK</label>

            <input type="radio" id="radioCNT" class="type" name="type" value="CNT" form="spendform">
            <label for="radioCNT">CNT</label>
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
<input class="saveinput" type="submit" value="SAVE" form="spendform">




@endsection