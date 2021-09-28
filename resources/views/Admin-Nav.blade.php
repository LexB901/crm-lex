@extends('layouts.themalogin')

@section('content')
<style>
    .navigatie {
        height: 80vh;
        margin-top: 55px;
        position: relative;
        bottom: 100px;
        display: flex;
        flex-direction: column;
        font-size: 22px;
        font-weight: 600;
        align-items: center;
        justify-content: center;
    }

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

    .links>a {
        color: white;
    }

    .title {
        color: white;
    }

    .bg-white {
        background-color: white;
    }

    .footer {
        background-color: transparent;
        color: white;
    }
</style>
<title>Beheer Panel</title>
<div class="navigatie">
    <a style="padding-top:20px;" href="/User-Beheer">Gebruikers beheren</a>
    <a style="padding-top:20px;" href="/Weetjes-Beheer">Weetjes beheren</a>
    <a style="padding-top:20px;" href="/Rollen-Beheer">Rollen beheren</a>
    <a style="padding-top:20px;" href="/Suggesties">Suggesties beheren</a>
</div>


@endsection