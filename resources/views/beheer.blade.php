@extends('layouts.themalogin')

@section('content')
<style>
    .navigatie {
        position: absolute;
        display: flex;
        flex-direction: column;
        padding: 10 0;
        font-size: 22px;
        font-weight: 600;
        margin: 20px;
    }

    a {
        color: black;
    }

    .footer {
        color: black;
    }
</style>
<title>Beheer Panel</title>
<div class="navigatie">
    <a href="/user">Gebruikers beheren</a>
    <a href="/profiel">Weetjes beheren</a>
    <a href="/admin">Rollen beheren</a>
</div>


@endsection