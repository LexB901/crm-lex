@extends('layouts.themalogin')

@section('content')
<title>ST.APE | Expenses</title>

<div class="borderblock"></div>

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