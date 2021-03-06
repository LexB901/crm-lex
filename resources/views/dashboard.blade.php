@extends('layouts.themalogin')

@section('content')
<style>
    body {
        background: #0f3854;
        background: radial-gradient(ellipse at center, #000000 30%, #0a2e38 70%);
        background-size: 100%;
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        font-family: "Avenir Next", "Avenir", sans-serif
    }

    a {
        color: black;
    }

    #logo {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 500px;
        left: 40%;
        top: 35%;
    }

    .footer {
        background-color: transparent;
        color: white;
    }

    .links>a {
        color: white;
    }

    .title {
        color: white;
    }

    #demo {
        fill: #fff;
    }

    #demo2 {
        fill: #fff;
    }

    .bg-white {
        padding-top: 0%;
        padding-bottom: 0%;
    }
</style>
<title>ST.APE | Dashboard</title>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>


<!-- Fonts -->

<!-- Scripts -->


<div class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')


    </div>
    <div id="logo">
        <a style="display:flex;align-items:center;justify-content:center;" href="https://www.flirtcreativity.com/nl/" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="200px" viewBox="0 0 1196.389 488.887" fill="#fff" class="logo">
                <path id="Path_1" data-name="Path 1" d="M897.25,0V103H903.8v-.009c0-.018,2.891-21.623,7.845-37.71h-.009C923.254,30.764,939.8,15.629,952.369,9.018h0a35.887,35.887,0,0,1,5.307-2.248v.009A54.583,54.583,0,0,1,974.7,3.9c8.506.273,40,3.984,40,44.083h0V440.9h-.018c0,40.592-32.306,43.9-40.328,44.092,0,0-16.2-.071-18.238-.141-4.636-.247-11.257-.917-16.545-2.768v.009a36.681,36.681,0,0,1-5.306-2.248h0c-7.113-3.737-15.487-10.208-23.535-21.358-7.484-12.156-11.847-27.626-15.294-40.874C879.885,357.793,874.719,293.868,853.088,236c-5.677-15.179-12.076-29.671-22.7-42.108-15.6-18.3-43.1-21.129-65.908-21.561,6.4.123,21.411-4.258,27.07-7.043,29.08-14.289,60.17-31.2,74.335-62.021,13.513-29.4,12.4-59.35-14.306-81.211-1.957-1.6-3.993-3.094-6.082-4.513C828.9,6.232,807.022.353,781.661,0H487.97V3.9l1.789-.009c7.916.194,39.5,3.447,40.284,42.611.009.441.026.864.026,1.313V441.022c-.07,40.469-19,43.765-27.009,43.959h-3.332c-7.986-.194-26.709-3.482-27-43.554v-55.56h-6.787c0,.071-3.041,21.693-7.387,36.361-11.636,35.5-28.454,50.923-41.192,57.622h0a35.875,35.875,0,0,1-5.306,2.248v-.009c-7.008,2.451-16.387,2.838-20.336,2.891h-4.548c-7.986-.194-40.063-3.482-40.31-43.624V47.979h0c0-40.592,32.306-43.9,40.328-44.092l1.789.009V0H0V3.9l1.789-.009c8,.194,40.231,3.491,40.319,43.924V194.419c-37.578-.035-35.444-28.075-35.471-38.538H.062v42.108l42.047.335V441.11c-.115,40.4-32.315,43.686-40.319,43.88L0,484.982v3.9H143.064v-3.9l-1.789.009c-8-.194-40.2-3.491-40.319-43.889V198.315h10.3c40.592,0,41.236,32.306,41.43,40.328l-.009,1.789h6.558V194.419H100.956V47.979h0c0-40.592,32.306-43.9,40.328-44.092h8.409c3.94.053,13.319.441,20.336,2.891V6.77a36.687,36.687,0,0,1,5.307,2.248h0c12.605,6.629,29.2,21.825,40.821,56.529C221.066,81.607,223.9,103,223.9,103h6.549V47.441c.291-40.072,19.014-43.36,27-43.554H261c8,.194,26.92,3.491,27.009,43.924V440.89h-.123c0,40.592-32.306,43.9-40.328,44.092l-1.789-.009v3.9H631.016v-3.9l-1.789.009c-8.013-.194-40.257-3.491-40.319-43.968V47.979h0c0-40.592,32.306-43.9,40.328-44.092h3.543c8,.194,40.231,3.491,40.319,43.924v397.8c.423,38.688,30.552,42.875,39.57,43.263l61.386.009v-3.9l-1.789.009c-7.986-.194-40.028-3.482-40.31-43.563V180.254h0a6.161,6.161,0,0,1,2.362-5.069.958.958,0,0,1,.1-.07.009.009,0,0,0,.009-.009,7.037,7.037,0,0,1,.978-.573c3.852-1.613,10.146-1.269,16.9-.961,7.766.538,13.954,1.869,18.485,4.354,23.342,12.834,31.5,47.459,36.282,71.929,4.187,21.482,3.887,42.743,4.8,64.533,1.666,39.825,2.988,79.078,21.878,115.077,8.321,15.849,19.137,30.64,33.558,41.456a97.444,97.444,0,0,0,14.509,9.009,88.773,88.773,0,0,0,12.085,5.042c9.344,3.085,19.163,3.676,28.965,3.887l192.78.018v-3.9l-1.789.009c-7.96-.194-39.817-3.464-40.3-43.193V47.979h0c0-40.125,31.548-43.81,40.019-44.083a54.5,54.5,0,0,1,17.066,2.882V6.77a36.685,36.685,0,0,1,5.306,2.248h0c12.605,6.629,33.743,21.817,46.049,56.512C1186.913,81.6,1189.84,103,1189.84,103h6.549V0ZM748.4,168.9a77.085,77.085,0,0,1-13.425.591c-2.019-.106-3.023-.793-3.023-2.433h0V47.979h0c0-40.592,32.306-43.9,40.328-44.092h3.429c5.174.123,20.468,1.551,30.658,13.469,3.623,4.381,8.921,13.108,9.582,27.308.053,1.075.08,2.168.08,3.3,0,78.716-28.269,105.5-48.235,115.439l-.115.018a109.4,109.4,0,0,1-12.032,4.213Z"></path>
            </svg></a>
    </div>

</div>


@endsection