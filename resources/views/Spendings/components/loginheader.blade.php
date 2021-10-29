<header>
    <style>

    </style>
    <div class="flex-center position-ref full-height">
        <div class="top-right links"></div>
        <div class="content">
            <div class="title m-b-md">
                Weetjes TM
            </div>

            <div class="links">
                @if(Request::url() === 'http://localhost:8000/Home')
                <style>
                    .currentnav1 {
                        text-decoration: underline;
                    }
                </style>
                @endif
                @if(Request::url() === 'http://localhost:8000/WeetjesForm')
                <style>
                    .currentnav2 {
                        text-decoration: underline;
                    }
                </style>
                @endif
                @if(Request::url() === 'http://localhost:8000/Alle-Weetjes')
                <style>
                    .currentnav3 {
                        text-decoration: underline;
                    }
                </style>
                @endif
                @if(Request::url() === 'http://localhost:8000/Mijn-Rollen')
                <style>
                    .currentnav4 {
                        text-decoration: underline;
                    }
                </style>
                @endif
                @if(Request::url() === 'http://localhost:8000/Admin-Nav')
                <style>
                    .currentnav5 {
                        text-decoration: underline;
                    }
                </style>
                @endif
                <a href="/Spendings">Expenses</a>
                <a class="currentnav1" href="/Home">Home</a>
                <a class="currentnav2" href="/WeetjesForm">Weetje toevoegen</a>
                <a class="currentnav3" href="/Alle-Weetjes">Alle weetjes</a>
                <a class="currentnav4" href="/Mijn-Rollen">Mijn rollen</a>
                <a class="currentnav5" href="/Admin-Nav">Admin panel</a>
            </div>
        </div>
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>

                <ul id="menu">
                    <a class="hbm" href="/Spendings">
                        <li>Expenses</li>
                    </a>
                    <a class="hbm" href="/Home">
                        <li>Home</li>
                    </a>
                    <a class="hbm" href="/WeetjesForm">
                        <li>Weetje toevoegen</li>
                    </a>
                    <a class="hbm" href="/Alle-Weetjes">
                        <li>Alle weetjes</li>
                    </a>
                    <a class="hbm" href="/Mijn-Rollen">
                        <li>Mijn rollen</li>
                    </a>
                    <a class="hbm" href="/Admin-Nav">
                        <li>Beheer panel</li>
                    </a>

                </ul>
            </div>
        </nav>
    </div>
</header>