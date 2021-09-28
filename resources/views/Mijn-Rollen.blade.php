@extends('layouts.themalogin')

@section('content')
<style>
    .centerform {
        margin-top: 50px;
        width: 50%;
        position: relative;
        left: 25%;
    }
</style>
<title>Mijn Rollen</title>
<div style="overflow-x:auto;">
    <table class="centerform">
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <td>{{$users->name}}</td>
                </tr>
                <tr>
                    <th>Rollen</th>
                    <td>
                        @for($i=0; $i < count($users->roles);$i++)
                            @if($i==count($users->roles) - 1) {{$users->roles[$i]['role']}}
                            @else {{$users->roles[$i]['role'].','}}
                            @endif
                            @endfor
                    </td>
                </tr>
                <tr>
                    <<th>Edit</th>
                        <th style="background-color: #aec6cf;" class="no-padding">
                            <a href="{{route('Rollen-Beheer.editRole',$users)}}">Edit</a>
                        </th>
                </tr>

            </div>
        </thead>
        <tbody>

</div>
</tbody>
</table>
</div>

@endsection