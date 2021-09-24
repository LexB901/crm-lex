@extends('layouts.themalogin')

@section('content')
<style>
    .bg-white {
        background-color: #557a95;
    }
</style>
<title>Alle Weetjes</title>
<div style="overflow-x:auto;">
    <table>
        <thead>
            <div class="weetjetitel">
                <tr>
                    <th>Gebruiker</th>
                    <th>Titel</th>
                    <th>Suggestie</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($suggestie as $post)
                <tr>
                    <td>{{$post->user->name }}</td>
                    <td>{{$post->suggestietitle}}</td>
                    <td>{{$post->suggestie}}</td>
                    <th style="background-color: #aec6cf;" class="no-padding">

                        <a href="{{route('suggestie.editSuggestie',$post->id)}}">Edit</a>

                    </th>
                    <th style="background-color: #b0c4de; z-index:0;" class="no-padding">

                        <a onclick="return confirm('Weet u zeker dat u deze suggestie wilt verwijderen?')" href="{{"deleteSuggestie/".$post['id']}}">Delete</a>

                    </th>
                </tr>
            </div>

            @endforeach
</div>
</tbody>
</table>
</div>

@endsection