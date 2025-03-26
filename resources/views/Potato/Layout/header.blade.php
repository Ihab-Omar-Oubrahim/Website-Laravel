<div class="header">
    <div class="navbar">
        <div class="logo"><a href=" {{ route('index') }} "> <img src="{{ asset('assets/res/LogoTemp.png') }}"
                    alt="Logo" id="LogoTemp"> </a></div>
        <ul class="links">
            <li><a href="{{ route('index') }}"> <img src="{{ asset('assets/res/home.png') }}" alt="Home"> Home</a>
            </li>
            <li><a href="{{ route('About_Me') }}"> <img src="{{ asset('assets/res/Info.png') }}" alt="About"> About
                    Me</a></li>
            <li><a href="{{ route('Contact') }}"> <img src="{{ asset('assets/res/folder.png') }}" alt="Contact">
                    Contact</a></li>
            <li><a href="{{ route('Services') }}"> <img src="{{ asset('assets/res/task.png') }}" alt="Services"> Services</a></li>
            <li><a href="#"> <img src="{{ asset('assets/res/Options.png') }}" alt="Options"> Options</a></li>
        </ul>

        @guest
            <a href="{{ route('login') }}" class="action_btn"> Login </a>
        @endguest
        @auth()
            <!-- Profile Link -->
            <a href="#" class="action_btn" onclick="toggleProfile(event)"> {{ Auth::user()->name }} </a>

            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="action_btn" type="submit"> Logout </button>
            </form>

            <!-- Profile Pop-Up Section -->
            @include('Potato.Account.profile-section')
            <!-- Profile Pop-Up Section -->
        @endauth
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <!-- Old Switch

    <div style="margin: auto; width: 120px;">
        <div class="LightDark-PC">
            <input type="checkbox" id="checkbox-LD">
            <label for="checkbox-LD" class="LD-label">
                <i class="fas fa-sun"></i>
                <i class="fas fa-moon"></i>
                <div class="ball"></div>
            </label>
        </div>
    </div>

    -->

    <div class="dropdown_menu">
        <div class="logo2"><a href="{{ route('index') }}"> <img src="{{ asset('assets/res/Logotemp.png') }}"
                    alt="Logo" id="LogoTemp2"> </a></div>
        <li><a href="{{ route('index') }}"> <img src="{{ asset('assets/res/home.png') }}" alt="Home"> Home</a>
        </li>
        <li><a href="{{ route('About_Me') }}"> <img src="{{ asset('assets/res/Info.png') }}" alt="About"> About
                Me</a></li>
        <li><a href="{{ route('Contact') }}"> <img src="{{ asset('assets/res/folder.png') }}" alt="Contact">
                Contact</a></li>
        <li><a href="{{ route('Services') }}"> <img src="{{ asset('assets/res/task.png') }}" alt="Services"> Services</a></li>
        <li><a href="#"> <img src="{{ asset('assets/res/Options.png') }}" alt="Options"> Options</a></li>
        @guest
            <li><a href="{{ route('login') }}" class="action_btn"> Login </a></li>
        @endguest
        @auth()
            <style>
                .dropdown_menu.open {
                    height: 520px !important;
                }
            </style>
            <li href="" class="  action_btn" onclick="toggleProfile(event)"> {{ Auth::user()->name }} </li> <br>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="action_btn" type="submit"> Logout </button>
            </form>
        @endauth
        <br>
        <!--
        <div class="LD-container">
            <div class="LightDark">
                <input type="checkbox" id="checkbox-LD2">
                <label for="checkbox-LD2" class="LD-label2">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                    <div class="ball2"></div>
                </label>
            </div>
        </div>
        -->

    </div>
</div>
