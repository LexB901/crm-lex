@extends('layouts.thema1')

@section('content')

<head>
    <style>
        * {
            margin: 0;
            border: 0;
            outline: none;
            box-sizing: border-box;
        }

        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: "Nunito", sans-serif;
            font-weight: 200;
            height: 100vh;
            overflow: hidden;
        }

        .footerholder {
            text-align: center;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #ffffff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 300px;
            color: #fff;
        }

        body {
            background: #0f3854;
            background: radial-gradient(ellipse at center, #000000 30%, #0a2e38 70%);
            background-size: 100%;
            display: flex;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
        }

        .time-display {
            position: relative;
            top: 520px;
            width: 100%;
            height: 90px;
            display: flex;
            justify-content: center;
            color: #ffffff;
        }

        #time {
            height: 90px;
            width: 220px;
            font-size: 100px;
            display: flex;
            align-items: center;
        }

        #seconds {
            font-size: 40px;
            width: 50px;
            height: 50px;
            margin-top: 35px;
            margin-left: 40px;
        }

        #date {
            position: absolute;
            width: 26%;
            right: 33%;
            top: 730px;
            height: 25px;
            font-size: 25px;
            color: #ffffff;
        }

        .logo {
            position: relative;
            display: inline;
            top: 500px;
            height: 100px;
        }
    </style>
</head>

<script>

</script>
<title>Home</title>

<div class="time-display">
    <div id="time"></div>
    <div id="seconds"></div>
</div>
<div id="date"></div>

<script type="text/javascript" src="/js/script.js"> </script>

@endsection