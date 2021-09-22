@extends('layouts.themalogin')

@section('content')
<style>
</style>
<title>Mijn Rollen</title>
<div style="overflow-x:auto;">
    <table style="margin-top: 50px;">
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
                            <a href="{{route('admin.editRole',$users)}}">Edit</a>
                        </th>
                </tr>

            </div>
        </thead>
        <tbody>
            <div class="weetje">
                <!-- @foreach($roles as $role)
                <tr>
                    <td>{{$users}}</td>
                    <td>{{$role->role}}</td>
                    <th style="background-color: #aec6cf;" class="no-padding">
                        <a href="{{route('admin.editRole2',$role)}}">Edit</a>
                    </th>
                    <th style="background-color: #b0c4de;" class="no-padding">
                        <a href="{{"deleteRole/".$role['id']}}">Delete</a>
                    </th>
                </tr>
                @endforeach -->


                <tr>





                </tr>


            </div>
</div>
</tbody>
</table>
</div>

@endsection