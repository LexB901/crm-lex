@extends('layouts.themalogin')

@section('content')
<style>
    a {
        color: white;
    }

    body {
        background: #0f3854;
        background: radial-gradient(ellipse at center, #000000 30%, #0a2e38 70%);
        background-size: 100%;
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100%;
    }
</style>
<title>Beheer Panel</title>
<div class="navigatie">
    <a style="padding-top:20px;" href="/User-Beheer">Gebruikers beheren</a>
    <a style="padding-top:20px;" href="/Rollen-Beheer">Rollen beheren</a>
</div>


@endsection