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

    .filterborder {
        border: none;
    }

    .filterborder:nth-child(2) {
        color: black;
    }

    .filterborder:nth-child(4) {
        color: green;
    }

    .filterborder:nth-child(6) {
        color: red;
    }

    .type {
        margin-left: 10px;
        background-color: black;
        color: white;
        height: 20px;
    }

    .selectmargin {
        margin: 1px;
    }

    .radio-filter {
        display: flex;
        flex-direction: row;
        margin-left: 15px;
    }

    .radio-filter input[type="radio"] {
        opacity: 0;
        width: 0;
    }

    .radio-filter label {
        font-family: sans-serif, Arial;
        color: black;
        font-size: 16px;
    }

    .radio-filter input[type="radio"]:checked+label {
        background-color: white;
        color: black;
    }

    .filter {
        margin-left: 0px !important;
    }

    .paid {
        background-color: rgba(0, 128, 0, 0.1);
    }

    .unpaid {
        background-color: #ffcccb;
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
        <div class="radio-filter">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <form action="" method="get" id="myForm" name="myForm" style="display:flex;margin-block-end: 1em;">
                <input type="radio" id="radioAll" name="filter" value="All" onChange="autoSubmit();">
                <label class="filterborder" for="radioAll">all</label>
                /
                <input type="radio" id="radioPaid" class="filter type" name="filter" value="Paid" onChange="autoSubmit();">
                <label class="filterborder" for="radioPaid">paid</label>
                /
                <input type="radio" id="radioUnpaid" class="filter type" name="filter" value="Unpaid" onChange="autoSubmit();">
                <label class="filterborder" for="radioUnpaid">unpaid</label>
            </form>
            <script>
                function autoSubmit() {
                    var formObject = document.forms['myForm'];
                    formObject.submit();
                }
            </script>
            <?php
            if (!empty($_GET['filter'])) {
                $selected = $_GET['filter'];
            } else {
                $selected = 'All';
            }
            ?>
        </div>
        <a href="/expense/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>
        <div>
            <?php
            if (!empty($_GET['filter'])) {
                $selected = $_GET['filter'];
            } else {
                $selected = 'All';
            }
            if ($selected === "All") {
                echo '<p style="margin-left:15px; border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::all();
                foreach ($filters as $filter) {
                    if ($filter->status === "Paid") {
                        echo '<div class="spendinghover paid">';
                    } else if ($filter->status === "Unpaid") {
                        echo '<div class="spendinghover unpaid">';
                    }
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            if ($selected === "Paid") {
                echo '<p style="margin-left:15px;border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::where('status', 'Paid')->get(['name', 'id', 'amount']);
                foreach ($filters as $filter) {
                    echo '<div class="spendinghover paid">';
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            if ($selected === "Unpaid") {
                echo '<p style="margin-left:15px;border-bottom: 1px solid rgb(0, 0, 0, 0.1);margin-bottom: 5px;">Filter: ' . $selected . '</p>';
                $filters = \App\Spending::where('status', 'Unpaid')->get(['name', 'id', 'amount']);
                foreach ($filters as $filter) {
                    echo '<div class="spendinghover unpaid">';
                    echo '<a href="/expense/' . $filter->id . '/edit" class="spendingname" style="text-decoration:none;">';
                    echo $filter->name;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingamount" style="text-decoration:none;">€';
                    echo $filter->amount;
                    echo '</a><a href="/expense/' . $filter->id . '/edit" class="spendingid" style="text-decoration:none;">';
                    echo $filter->id;
                    echo '</a>';
                    echo '</div>';
                    echo '<a href="/expense/' . $filter->id . '/delete" class="spendingid deletespending" style="text-decoration:none;">Delete</a>';
                }
            }
            ?>
        </div>
    </div>
</div>
@endsection