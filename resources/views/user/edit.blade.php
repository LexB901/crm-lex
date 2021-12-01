@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expense</title>

<div class="borderblock"></div>

@if(Request::url() === "http://127.0.0.1:8000/user/".$input->id."/edit")
<style>
    .currentnav3 {
        background-color: rgb(0, 0, 0, .3);
    }
</style>
@endif
<div class="cursor-pointer mr-2 relative flex space-x-2 items-center">
    <a href="{{ url()->previous() }}">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="headerbackimg">
            <path fill="currentColor" d="M459.5 71.41l-171.5 142.9v83.45l171.5 142.9C480.1 457.7 512 443.3 512 415.1V96.03C512 68.66 480.1 54.28 459.5 71.41zM203.5 71.41L11.44 231.4c-15.25 12.87-15.25 36.37 0 49.24l192 159.1c20.63 17.12 52.51 2.749 52.51-24.62v-319.9C255.1 68.66 224.1 54.28 203.5 71.41z" class=""></path>
        </svg>
    </a>
</div>
<div class="spendingspage">
    <div class="management">
        <p class="ptitle">Usermanagement</p>
        <a href="/user/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        <div>
            @foreach($users as $user)

            @if(Auth::id() === $user->id)
            <div class="spendinghover">
                <a href="{{route('user.edit',$user->id)}}" class="spendingname userleft" style="text-decoration:none;">{{ $user->name }}</a>
            </div>
            <div onclick="return confirm('Je kan jezelf niet verwijderen')" class="spendingid deletespending" style="text-decoration:none;display:none;"></div>
            @elseif ($user->id != $input->id)
            <div class="spendinghover">
                <a href="{{route('user.edit',$user->id)}}" class="spendingname userleft" style="text-decoration:none;">{{ $user->name }}</a>
            </div>
            <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"/user/".$user['id']."/delete"}}" class="spendingid deletespending" style="text-decoration:none;">Delete</a>
            @else
            <div class="spendinghover togglespending">
                <a href="{{route('user.edit',$user->id)}}" class="spendingname userleft" style="text-decoration:none;">{{ $user->name }}</a>
            </div>
            <div onclick="return confirm('Je kan de uitgave niet verwijderen, omdat je hem aan het wijzigen bent.')" class="spendingid deletespending" style="  text-decoration:none">CURRENT</div>
            @endif
            @endforeach
        </div>
    </div>

    @foreach($users as $user)
    @if ($user->id != $input->id)
    @else
    <div class="spendingsform">
        <p class="formtitle">Edit</p>
        <form id="spendform" action="/user/{{$user->id}}/update" method="post">
            @endif

            @endforeach
            <!-- enctype="multipart/form-data" -->
            @csrf
            <input type="hidden" name="id" value="{{$user['id']}}">
            Name<br>
            <input value="{{ $input->name }}" class="spendingsinput" type="text" name="name"><br>
            @if($errors->has('name'))
            <div class="caterror">{{ $errors->first('name') }}</div>
            @endif
            Email<br>
            <input value="{{$input->email}}" type="text" name="email" class="spendingsinput">
            @if($errors->has('email'))
            <div class="caterror">{{ $errors->first('date') }}</div>
            @endif
            Group<br>
            <select class="spendingsinput selectmargin" name="role">
                @if($input->role === 'Member')
                <option value="{{$input->role}}">{{ $input->role }}</option>
                <option value="Admin">Admin</option>
                <option value="Client">Client</option>
                @elseif($input->role === 'Admin')
                <option value="{{$input->role}}">{{ $input->role }}</option>
                <option value="Member">Member</option>
                <option value="Client">Client</option>
                @elseif($input->role === 'Client')
                <option value="{{$input->role}}">{{ $input->role }}</option>
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
                @else
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
                <option value="Client">Client</option>
                @endif
            </select>
            Account status
            {{$input->status}}
            <select name="status" class="spendingsinput selectmargin">
                @if($input->status === '1')
                <option value="{{$input->status}}">Actief</option>
                <option value="2">Banned</option>
                @elseif($input->status === '2')
                <option value="{{$input->status}}">Banned</option>
                <option value="1">Actief</option>
                @else
                <option value="{{$input->status}}">Actief</option>
                <option value="2">Banned</option>
                @endif
            </select>
        </form>

    </div>

</div>
<div class="total">
    <input style="bottom:10px;z-index:30" class="saveinput" type="submit" value="UPDATE" form="spendform">
</div>