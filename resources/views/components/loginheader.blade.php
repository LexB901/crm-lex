<header>

    <div class="navspendings">
        <div class="logospendbox">
            <div class="useraccount">
                <a class="useraccountlink" href="/account">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="usericon">
                        <path fill="white" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" class=""></path>
                    </svg>
                </a>

            </div>
            <div class="saintape">
                <button onClick="window.location='/dashboard'" class="saintapebutton">
                    <svg id="Group_26" data-name="Group 26" xmlns="http://www.w3.org/2000/svg" width="76.1" height="44.189" viewBox="0 0 76.1 44.189" class="saintapeicon">
                        <path fill="black" id="Path_34" data-name="Path 34" d="M210.743,246.084c-.221-1.173-.07-4-.405-6.539a7.844,7.844,0,0,0-6.487-7.089c-1.54-.246-3.057-.637-4.578-.99s-3.051-.736-4.619-1.12a2.472,2.472,0,0,0-.643-.074,8.361,8.361,0,0,0-3.381.772,20.148,20.148,0,0,0-8.222,6.3c-.78,1.028-1.768,2.2-1.877,3.381-.406,4.424-1.019,8.834-.228,13.344a10.9,10.9,0,0,0,1.667,4.13c1.014,1.638,2.6,1.767,4.083,2.258a16.125,16.125,0,0,0,10.915-.163c2.382-.923,4.658-2.12,6.981-3.2.861-.4,2.055-.59,2.517-1.24,1.985-2.8,1.711-6.439,4.06-8.233C210.934,247.316,210.8,246.369,210.743,246.084Z" transform="translate(-179.918 -230.272)" fill="#e8e8e8" />
                        <path fill="black" id="Path_35" data-name="Path 35" d="M288.623,315.3c1.283-.989,1.194-1.962.544-3.113-.737-1.3-1.27-2.722-1.961-4.055a4.38,4.38,0,0,0-5.162-2.244,3.671,3.671,0,0,1-1.759.014c-2.646-.741-4.141-.147-5.345,2.351-.6,1.243-.93,2.623-1.592,3.824-1.415,2.568-1.128,5.309-.417,7.827.674,2.384,1.483,5.217,4.629,5.665a32.241,32.241,0,0,0,6.55.3c3.486-.223,6.177-5.928,4.476-8.691l1.068-1.53Z" transform="translate(-243.055 -281.732)" fill="#e8e8e8" />
                        <path fill="black" id="Path_36" data-name="Path 36" d="M353.852,246.646l-1.586-5.056c-.247-.631-.856-.457-1.2.221l-.047-.06a1.28,1.28,0,0,1-.276-.792l0-4a.335.335,0,0,0-.092-.211c-3.155-3.295-7.236-4.381-11.9-3.746-1.612.219-3.22.467-4.834.661-2.435.292-4.928.659-6.451,2.786-1.407,1.964-2.95,3.942-2.807,6.659a8.669,8.669,0,0,1-.677,2.946c-.723,2.243-.887,4.293,1.145,6.066a4.621,4.621,0,0,1,.937,2.2c.335,1.21.414,2.507.864,3.665.593,1.529,1.887,1.736,3.369.966a1.9,1.9,0,0,1,1.73.251,15.9,15.9,0,0,0,7.273,3.73c3.527.876,7.055,1.108,10.43-.534a5.577,5.577,0,0,0,2.434-2.035l.031-.037h0S354.9,249.453,353.852,246.646Z" transform="translate(-277.993 -232.019)" fill="#e8e8e8" />
                    </svg>

                </button>
            </div>
            <div class="userlogout">
                <a class="userlogoutlink" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="usericon">
                        <path fill="currentColor" d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z" class=""></path>x
                    </svg>
                </a>
                <form id="logout-form" action="{{ route('logout')}}" method="POST">
                    @csrf
                </form>


                <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="userlogouticon">
                    <path fill="currentColor" d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z" class=""></path>x
                </svg> -->


            </div>
        </div>

        <div class="navspendbox">

            @if(Request::url() === 'http://127.0.0.1:8000/dashboard')
            <style>
                .currentnav1 {
                    background-color: rgb(0, 0, 0, .3);
                }
            </style>
            @elseif(Request::url() === 'http://127.0.0.1:8000/expenses')
            <style>
                .currentnav2 {
                    background-color: rgb(0, 0, 0, .3);
                }
            </style>
            @elseif(Request::url() === 'http://127.0.0.1:8000/users')
            <style>
                .currentnav3 {
                    background-color: rgb(0, 0, 0, .3);
                }
            </style>
            @endif
            <div class="navspendtextbox">
                <a style="text-decoration:none;" class="navspendtext currentnav1" href="/dashboard">dashboard</a><br>
            </div>
            <div class="navspendtextbox">
                <a style="text-decoration:none;" class="navspendtext currentnav2" href="/expenses">expenses</a><br>
            </div>
            <div class="navspendtextbox">
                <a style="text-decoration:none;" class="navspendtext currentnav3" href="/users">users</a><br>
            </div>
            <div class="navspendtextbox">
                <a style="text-decoration:none;" class="navspendtext" href="/Mijn-Rollen">Mijn Rollen</a><br>
            </div>
            <div class="navspendtextbox">
                <a style="text-decoration:none;border:none;" class="navspendtext" href="/Admin-Nav">Admin Panel</a><br>
            </div>
        </div>
        <footer>
            <div class="footer">
                <p class="pfooter">Copyright © 2021 Saint Ape, Inc.</p>
            </div>
        </footer>
    </div>
</header>