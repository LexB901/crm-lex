@extends('layouts.themalogin')

@section('content')
<style>

</style>
<div style="overflow-x:auto;">
    <table>
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Lid sinds:</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                    <td><img style="height: 50px;" src="{{asset('/storage/'.$user->image)}}"></td>
                    <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('user.editUser',$user->id)}}">Edit</a>
                    </th>
                    <th style="background-color: #b0c4de;" class="no-padding">
                        <a href="{{"deleteUser/".$user['id']}}">Delete</a>
                    </th>
                </tr>
            </div>

            @endforeach
</div>
</tbody>
</table>
</div>

@endsection