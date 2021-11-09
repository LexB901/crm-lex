@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Users</title>

<div class="borderblock"></div>

<div class="spendingspage">
    <div class="management">
        <p class="ptitle">Usermanagement</p>
        <a href="/user/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>

        @foreach($users as $user)
        <div class="spendinghover">
            <a href="{{route('user.edit',$user->id)}}" class="spendingleft" style="text-decoration:none;">{{ $user->name }}</a>
        </div>
        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"user/".$user['id']."/delete"}}" class="spendingid deletespending">Delete</a>

        @endforeach
    </div>
</div>
@endsection