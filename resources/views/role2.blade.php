@extends('layouts.themalogin')

@section('content')
<title>Rollen</title>

<h1>Rollen:</h1>
<div class="informatie">
    @csrf
    Naam: {{ $roles->name }}<br>

    Rollen:

    @foreach($rol as $role)

    {{ $role->role . ', ' }}
    @endforeach

</div>

@endsection