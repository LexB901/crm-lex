@extends('layouts.themalogin')

@section('content')
<style>
    .navigatie {
        position: relative;
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
        height: 100vh;
    }

    .links>a {
        color: white;
    }

    .title {
        color: white;
    }
</style>
<title>Beheer Panel</title>
<div style="padding:500px 0;" class="navigatie">
    <a style="padding-top:20px;" href="/user">Gebruikers beheren</a>
    <a style="padding-top:20px;" href="/profiel">Weetjes beheren</a>
    <a style="padding-top:20px;" href="/admin">Rollen beheren</a>
</div>


@endsection