@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expense</title>

<div class="borderblock"></div>

@if(Request::url() === "http://localhost:8000/expense/".$input->id."/edit")
<style>
    .currentnav2 {
        background-color: rgb(0, 0, 0, .3);
    }
</style>
@endif

<div class="spendingspage">

    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/user/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        <div>
            @foreach($users as $user)


            @if ($user->id != $input->id)
            <div class="spendinghover">
                <a href="{{route('user.edit',$user->id)}}" class="spendingname" style="text-decoration:none;">{{ $user->name }}</a>
            </div>
            <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"/expense/".$user['id']."/delete"}}" class="spendingid deletespending" style="text-decoration:none;">Delete</a>
            @else
            <div class="spendinghover togglespending">
                <a href="{{route('user.edit',$user->id)}}" class="spendingname" style="text-decoration:none;">{{ $user->name }}</a>
            </div>
            <a onclick="return confirm('Je kan de uitgave niet verwijderen, omdat je hem aan het wijzigen bent.')" class="spendingid deletespending" style="text-decoration:none">Delete</a>

            @endif
            @endforeach
        </div>




    </div>
    <div class="spendingsform">
        <form id="spendform" action="/user/{{$user->id}}/update" method="post">
            <!-- enctype="multipart/form-data" -->
            @csrf
            Name<br>
            <input value="{{ $user->name }}" class="spendingsinput" type="text" name="name"><br>
            @if($errors->has('name'))
            <div class="caterror">{{ $errors->first('name') }}</div>
            @endif
            Date<br>
            <input value="{{$user->email}}" type="text" name="email" class="spendingsinput">
            @if($errors->has('email'))
            <div class="caterror">{{ $errors->first('date') }}</div>
            @endif

        </form>

    </div>

</div>
<div class="total">
    <input style="bottom:10px;z-index:30" class="saveinput" type="submit" value="UPDATE" form="spendform">
</div>