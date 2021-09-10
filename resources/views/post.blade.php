@extends('layouts.themalogin')

@section('content')
<title>Weetje</title>

<h1>Weetje:</h1>
<div class="informatie">

    Titel: {{ $input['title'] }}<br>
    Weetje: {{ $input['weetje'] }}<br>
    Categorie: {{ $categorie['categorie'] }}<br>
    Gebruiker: {{ $user['name'] }}<br>
    Datum: {{ \Carbon\Carbon::parse($input['created_at'])->format('d/m/Y') }}

</div>

@endsection