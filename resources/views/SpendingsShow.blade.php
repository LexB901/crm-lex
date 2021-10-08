@extends('layouts.themalogin')

@section('content')

@foreach($spendings as $spending)

<embed src="{{asset('/storage/'.$spending->file)}}">
{{ strpos($spending->file,'pdf') }}

@endforeach

@endsection