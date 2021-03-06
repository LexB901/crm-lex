@extends('layouts.themalogin')

@section('content')
<style>
    table {
        margin-top: 30px;
        left: 5%;
        width: 90%;
    }
</style>
<title>Rollen Beheer</title>
<div style="overflow-x:auto;">
    <table>
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <th>Rollen</th>
                    <th>Edit</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($allusers as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>

                        @for($i=0; $i < count($user->roles);$i++)
                            @if($i==count($user->roles) - 1) {{$user->roles[$i]['role']}}
                            @else {{$user->roles[$i]['role'].','}}
                            @endif
                            @endfor
                    </td>
                    <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('Rollen-Beheer.editRoleAdmin',$user)}}">Edit</a>
                    </th>
                </tr>
                @endforeach
            </div>
</div>
</tbody>
</table>
</div>

@endsection