@extends('layouts.themalogin')

@section('content')
<style>
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

    th {
        width: 10%;
    }

    td {
        width: 10%;
    }

    table {
        margin-top: 30px;
        left: 5%;
        width: 90%;
    }
</style>
<title>Alle Gebruikers</title>
<div style="overflow-x:auto;">
    <table style="margin-bottom: 100px;">
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <th>Foto</th>
                    <th>Email</th>
                    <th>Lid sinds:</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Status</th>
                    <th>Session</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($users as $user)

                <tr>
                    <td>{{$user->name}}</td>
                    <td style="z-index:1;"><img style="z-index:10;" id="pf" src="{{asset('/storage/'.$user->image)}}">
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('User-Beheer.editUser',$user->id)}}">Edit</a>
                    </th>
                    <th style="background-color:#e34234;" class="no-padding">
                        <a onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')" href="{{"deleteUser/".$user->id}}">Delete</a>
                    </th>
                    @if( $user->status == 0)
                    <th style="background-color:darkred;" class="no-padding">Banned</th>
                    @else
                    <th style="background-color:darkgreen;" class="no-padding">Actief</th>
                    @endif
                    <th style="background-color: #b0c4de; width:10%;" class="no-padding">
                        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"deleteSession/".$user['id']}}">Delete</a>
                    </th>
                    @endforeach






                </tr>



            </div>
        </tbody>
    </table>
    {{ $users->links() }}
</div>

@endsection