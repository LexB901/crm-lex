@extends('layouts.themalogin')

@section('content')


<div style="overflow-x:auto;">
    <table>
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Naam</th>
                    <th>Rollen</th>
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($roles as $role)
                <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$role->role}}</td>
                    <!-- <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('admin.editRole',$role->id)}}">Edit</a>
                    </th> -->
                    <th style="background-color: #b0c4de;" class="no-padding">
                        <a href="{{"deleteRole/".$role['id']}}">Delete</a>
                    </th>
                </tr>
                @endforeach
            </div>
</div>
</tbody>
</table>
</div>

@endsection