@extends('layouts.themalogin')

@section('content')
<style>
    .bg-white {
        background-color: #557a95;
    }

    table {
        margin-top: 30px;
        left: 5%;
        width: 90%;
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
                    <th>Weetje</th>
                    <th>Categorie</th>
                    <th>Datum</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </div>
        </thead>
        <tbody>
            <div class="weetje">
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->weetje}}</td>
                    <td>{{$post->categorien->categorie}}</td>
                    <td>{{\Carbon\Carbon::parse($post['date'])->format('d/m/Y')}}</td>
                    <th style="background-color: #aec6cf;" class="no-padding">

                        <a href="{{route('Form.edit',$post->id)}}">Edit</a>

                    </th>
                    <th style="background-color: #b0c4de; z-index:0;" class="no-padding">

                        <a onclick="return confirm('Weet je zeker dat je dit weetje wilt verwijderen?')" href="{{"deleteWeetje/".$post['id']}}">Delete</a>

                    </th>
                </tr>
            </div>

            @endforeach

        </tbody>

    </table>
    {{ $posts->links() }}

</div>

@endsection