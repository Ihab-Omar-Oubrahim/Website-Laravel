<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Fonts/Google_Fonts.css') }}">
<div class="sidebar">
    <div class="top">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/res/LogoTemp.png') }}" alt="Logo" id="WebLogo">
            </a>
            <span>PotatoWeb</span>
        </div>

        <i class="fas fa-bars" id="btn"></i>
    </div>
    <div class="user">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/res/Admin_Res/Admin_Logo.png') }}" alt="test" class="user-img">
        </a>
        <div>
            <p class="bold"> {{ Auth::user()->admin->username }} </p>
            <p style="font-size: 12px"> Owner </p>
        </div>
    </div>
    <ul>
        <li>
            <a href="{{route('dashboard_menu')}}">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/dashboard.png') }}" alt="contacts"
                    id="sidebar_img">
                <span class="nav-item"> Dashboard </span>
            </a>
            {{-- <span class="tooltip"> Dashboard </span> --}}
        </li>
        <li>
            <a href="{{route('dashboard_contacts')}}">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="contacts" id="sidebar_img">
                <span class="nav-item"> Contacts </span>
            </a>
            {{-- <span class="tooltip"> Contacts </span> --}}
        </li>
        <li>
            <a href="{{ route('dashboard_shared') }}">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/shared.png') }}" alt="shared" id="sidebar_img2">
                <span class="nav-item"> Shared </span>
            </a>
            {{-- <span class="tooltip"> Shared </span> --}}
        </li>
        <li>
            <a href="{{ route('dashboard_comments') }}">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/comments.png') }}" alt="comments" id="sidebar_img">
                <span class="nav-item"> Comments </span>
            </a>
            {{-- <span class="tooltip"> Comments </span> --}}
        </li>
        <li>
            <a href="{{ route('dashboard_reports') }}">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/report.png') }}" alt="reports" id="sidebar_img">
                <span class="nav-item"> Reports </span>
            </a>
            {{-- <span class="tooltip"> Reports </span> --}}
        </li>
        <li>
            <a href="{{ route('dashboard_users')}}  ">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/accounts.png') }}" alt="accounts"
                    id="sidebar_img">
                <span class="nav-item"> Accounts </span>
            </a>
            {{-- <span class="tooltip"> Accounts </span> --}}
        </li>
        <li>
            <a href="#">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/staffs.png') }}" alt="staffs" id="sidebar_img">
                <span class="nav-item"> Staffs </span>
            </a>
            {{-- <span class="tooltip"> Staffs </span> --}}
        </li>
        <li>
            <a href="#">
                <img src="{{ asset('assets/res/Admin_Res/sidebar_res/logout.png') }}" alt="logout" id="sidebar_img">
                <span class="nav-item"> Logout </span>
            </a>
            {{-- <span class="tooltip"> Logout </span> --}}
        </li>

    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function() {
            sidebar.classList.toggle('active');
        };
    });
</script>
