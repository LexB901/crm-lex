@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expenses</title>
<style>
    .headerbackimg {
        position: absolute;
        left: 201px;
        height: 1.3rem;
        z-index: 100;
    }
</style>
<div class="borderblock"></div>
<div class="cursor-pointer mr-2 relative flex space-x-2 items-center">
    <a href="{{ url()->previous() }}">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="headerbackimg">
            <path fill="currentColor" d="M459.5 71.41l-171.5 142.9v83.45l171.5 142.9C480.1 457.7 512 443.3 512 415.1V96.03C512 68.66 480.1 54.28 459.5 71.41zM203.5 71.41L11.44 231.4c-15.25 12.87-15.25 36.37 0 49.24l192 159.1c20.63 17.12 52.51 2.749 52.51-24.62v-319.9C255.1 68.66 224.1 54.28 203.5 71.41z" class=""></path>
        </svg>
    </a>
</div>
<div class="spendingspage">
    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/expense/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>

        @foreach($spendings as $spending)
        <div class="spendinghover">
            <a href="{{route('expense.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->name }}</a>
            <a href="{{route('expense.edit',$spending->id)}}" style="display:flex;justify-content:right;margin-right:15px;text-decoration:none;">€{{ $spending->amount }}</a>
            <a href="{{route('expense.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->id }}</a>
        </div>
        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"expense/".$spending['id']."/delete"}}" class="spendingid deletespending">Delete</a>

        @endforeach
    </div>
</div>
@endsection