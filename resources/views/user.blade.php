@extends('layouts.themalogin')

@section('content')
<style>
    td {
        padding: 0px;
    }

    .bg-white {
        background-color: #557a95;
    }

    #pf {
        height: 50px;
        transition: transform .4s;
        margin-top: 6px;
    }

    .pfexpand {
        -ms-transform: scale(1.5);
        -webkit-transform: scale(1.5);
        transform: scale(1.5);

    }

    #pf:hover {
        transform: scale(3);
        -ms-transform: scale(3);
        -webkit-transform: scale(3);
    }
</style>
<title>Alle Gebruikers</title>
<div style="overflow-x:auto;">
    <table style="margin-bottom: 100px;">
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Lid sinds:</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Status</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><img id="pf" src="{{asset('/storage/'.$user->image)}}"></td>
                    <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('user.editUser',$user->id)}}">Edit</a>
                    </th>
                    <th style="background-color: #b0c4de;" class="no-padding">
                        <a href="{{"deleteUser/".$user['id']}}">Delete</a>
                    </th>
                    <th style="background-color: #93cbef;" class="no-padding">
                        @if( $user->status == 0)
                        Banned
                        @else Actief
                        @endif
                        <!-- <a href="{{"banUser/".$user['id']}}">Ban</a> -->
                        <!-- {{ $user->status }} -->
                    </th>
                </tr>
            </div>

            @endforeach
</div>
</tbody>
</table>
</div>

@endsection