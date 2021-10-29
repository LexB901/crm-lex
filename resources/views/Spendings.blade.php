<style>
    .logospendbox {
        width: 100%;
        height: 150px;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .useraccount,
    .userlogout,
    .saintape {
        border: 1px solid white;
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .useraccount {
        left: 14px;
    }

    .useraccounticon,
    .userlogouticon {
        color: white;
        width: 14px;
    }

    .saintape {
        border: none;
        width: 64px;
        height: 64px;
        background-color: #fff;
        align-items: center;
    }

    .saintapeicon {

        height: 35px;
    }

    .userlogout {
        right: 14px;
    }
</style>
<link rel="stylesheet" href="/css/style.css">
<div class="borderblock"></div>
<div class="navspendings">
    <div class="logospendbox">
        <div class="useraccount">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="useraccounticon">
                <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" class=""></path>
            </svg>
        </div>
        <div class="saintape">
            <img class="saintapeicon" src="https://crm.flirtserver.xyz/storage/1/stapelogo.svg" alt="">
        </div>
        <div class="userlogout">

            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="userlogouticon">
                <path fill="currentColor" d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z" class=""></path>
            </svg>
        </div>
    </div>
    <div class="navspendbox">
        @if(Request::url() === 'http://localhost:8000/Spendings')
        <style>
            .currentnav1 {
                background-color: rgb(0, 0, 0, .3);
            }
        </style>
        @endif
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext currentnav1" href="/Spendings">Expenses</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Home">Home</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/WeetjesForm">Weetje Toevoegen</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Alle-Weetjes">Alle Weetjes</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;" class="navspendtext" href="/Mijn-Rollen">Mijn Rollen</a><br>
        </div>
        <div class="navspendtextbox">
            <a style="text-decoration:none;border:none;" class="navspendtext" href="/Admin-Nav">Admin Panel</a><br>
        </div>
    </div>
</div>
<div class="spendingspage">
    <div class="management">
        <p class="ptitle">Expensemanagement</p>
        <a href="/Spendings/create">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plussvg">
                <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" class=""></path>
            </svg>
        </a>

        @foreach($spendings as $spending)
        <div class="spendinghover">
            <a href="{{route('Spendings.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->name }}</a>
            <a href="{{route('Spendings.edit',$spending->id)}}" style="display:flex;justify-content:right;margin-right:15px;text-decoration:none;">€{{ $spending->amount }}</a>
            <a href="{{route('Spendings.edit',$spending->id)}}" class="spendingleft" style="text-decoration:none;">{{ $spending->id }}</a>
        </div>
        <a onclick="return confirm('Weet je zeker dat je deze gebruiker zijn sessie wilt verwijderen?')" href="{{"Spendings/".$spending['id']."/delete"}}" class="spendingid deletespending">Delete</a>

        @endforeach
    </div>