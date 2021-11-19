@extends('layouts.themalogin')

@section('content')
<style>
    input {
        all: unset;
    }

    .accountblock {
        position: absolute;
        left: 200px;
        width: 80rem;
        padding-left: 2rem;
        padding-right: 2rem;
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
        left: 20%;
        margin-left: auto;
        margin-right: auto;
    }

    .accountoptions {
        width: 30rem;
        margin-right: 2rem;
    }

    .accountinfo {
        width: 50rem;
        padding: 2rem;
        border-radius: .375rem;
        box-shadow: 0px 6px 6px 1px rgba(0, 0, 0, .2);

    }

    .account-flex {
        display: flex;
        flex-direction: row;
        padding-bottom: 5rem;

    }

    .headerbackimg {
        position: relative;
        left: 200px;
        height: 1.3rem;
    }

    .accountnameinput,
    .accountemailinput {
        border-radius: .375rem;
        width: 97%;
        display: block;
        margin-top: .25rem;
        padding: .5rem;
        border: 1px solid rgb(219, 219, 219);
        padding-right: 12px;
    }

    .accountpasswordinput,
    .accountpasswordnewinput,
    .accountpasswordrepeatinput {
        border-radius: .375rem;
        width: 97%;
        display: block;
        margin-top: .25rem;
        padding: .5rem;
        border: 1px solid rgb(219, 219, 219);
        padding-right: 12px;
    }

    .accountsession:hover {
        text-decoration: none;
    }

    .accountsession {
        font-size: .8rem;
        width: 400px;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: .375rem;
        padding-bottom: .375rem;
        background-color: #333333;
        color: white;
        text-transform: uppercase;
        letter-spacing: .1em;
    }

    .sessionimg {
        position: relative;
        height: 2rem;
        width: 2rem;
        padding-bottom: 1rem;
    }

    .accountsave {
        color: white;
        background-color: #333333;
        border: none;
        margin-top: 1rem;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: .6rem;
        padding-bottom: .6rem;
        letter-spacing: .1em;
        font-size: .8rem;
        margin-left: auto;
    }

    .savediv {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
</style>
<title>ST.APE | Account</title>
<header style="height: 4rem; display:flex;position:relative;align-items:center;padding-left:2rem;padding-right:2rem;">
    <div class="flex items-center font-serif justify-between w-full">
        <div class="cursor-pointer mr-2 relative flex space-x-2 items-center">
            <a href="{{ url()->previous() }}">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="headerbackimg">
                    <path fill="currentColor" d="M459.5 71.41l-171.5 142.9v83.45l171.5 142.9C480.1 457.7 512 443.3 512 415.1V96.03C512 68.66 480.1 54.28 459.5 71.41zM203.5 71.41L11.44 231.4c-15.25 12.87-15.25 36.37 0 49.24l192 159.1c20.63 17.12 52.51 2.749 52.51-24.62v-319.9C255.1 68.66 224.1 54.28 203.5 71.41z" class=""></path>
                </svg>
            </a>
        </div>
        <div></div>
    </div>
</header>
<div class="accountblock">
    <div class="account-flex">
        <div class="accountoptions">
            <p style="color:black;font-size:1.3rem;">Profile Information</p>Update your account's profile information and email address.
        </div>
        <div class="accountinfo">
            <form method="post" action="/accountUpdate">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <p>Name:</p>
                <input class="accountnameinput" type="text" name="name" value="{{$data->name}}">
                <p style="margin-top:1rem;">Email</p>
                <input class="accountemailinput" type="text" name="email" value="{{$data->email}}">
                <div class="savediv">
                    <button class="accountsave">SAVE</button>
                </div>
            </form>
        </div>

    </div>
    <div class="account-flex">
        <div class="accountoptions">
            <p style="color:black;font-size:1.3rem;">Update Password</p>Ensure your account is using a long, random password to stay secure.
        </div>
        <div class="accountinfo">
            <form method="post" action="{{ route('change.password') }}">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <p>Current Password:</p>
                <input class="accountpasswordinput" type="password" name="current_password">
                <p style="margin-top:1rem;">New Password</p>
                <input class="accountpasswordnewinput" type="password" name="password">
                <p style="margin-top:1rem;">Confirm Password</p>
                <input class="accountpasswordrepeatinput" type="password" name="password_confirmation">
                <div class="savediv">
                    <button class="accountsave">SAVE</button>
                </div>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('success'))
            <span class="alert alert-success">
                <strong>{{ session()->get('success') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="account-flex">
        <div class="accountoptions">
            <p style="color:black;font-size:1.3rem;">Browser Sessions</p>Manage and logout your active sessions on other browsers and devices.
        </div>
        <div class="accountinfo">
            <p style="margin-bottom:1rem;">If necessary, you may logout on all of your other browser sessions accross all of your devices.<br>Some of your recent sessions are listed below; however, this list may not be exhaustive. If<br>you feel your account has been compromised, you should update your password.</p>
            <div>
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="sessionimg">
                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>

            <div>
                <a class="accountsession" href="{{"deleteSession/".$data['id']}}">logout other Browser sessions</a>
            </div>
        </div>

    </div>
    <div>
        <div></div>

        <div></div>
    </div>

</div>
@endsection