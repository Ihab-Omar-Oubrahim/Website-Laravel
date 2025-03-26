@auth
    <link rel="stylesheet" href="{{ asset('assets/CSS/Admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Responsive_Mobile/dashboard_mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Responsive_Mobile/Responsive.css') }}">

    <div class="container" id="container">
        <div class="Staff_Menu">
            <div class="Staff_info">
                <div class="staff_user">
                    <div class="staff_img">
                        <img src=" {{ Auth::user()->getImageURL() }} " alt="staff_pfp">
                    </div>
                    <div class="staff_name_role">
                        <p id="Welcome"> Welcome back </p>
                        <p id="staff_name"> {{ Auth::user()->admin->username }} </p>
                        <p id="staff_role"> Owner </p>
                    </div>
                </div>
                <div class="user_items">
                    {{-- to fill later --}}
                </div>
            </div>
            <div class="Dashboard_img">
                <img src="{{ asset('assets/res/Admin_res/dashboard_img.png') }}" alt="Dashboard Image">
            </div>
        </div>

        {{-- Dashes 1 --}}
        <div class="Dashes">
            <a href=" {{ route('dashboard_contacts') }} " style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="Contacts"
                        class="dash_icon">
                    <div class="dash_content">
                        <h3>Contacts</h3>
                        <p>Number of saved contacts</p>
                        <span class="counter"> {{ $contactsCount }} </span>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_shared') }} " style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/shared.png') }}" alt="Shared Messages"
                        class="dash_icon">
                    <div class="dash_content">
                        <h3>Shared Messages</h3>
                        <p>Total messages shared</p>
                        <span class="counter"> {{ $sharedMsgsCount }} </span>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_comments') }} " style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/comments.png') }}" alt="Comments"
                        class="dash_icon">
                    <div class="dash_content">
                        <h3>Comments</h3>
                        <p>Users Comments received</p>
                        <span class="counter"> {{ $commentsCount }} </span>
                    </div>
                </div>
            </a>

        </div>

        {{-- Dashes 1 --}}

        {{-- Dashes 2 --}}
        <div class="Dashes">
            <a href="{{ route('dashboard_visits') }}" style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/view.png') }}" alt="Contacts" class="dash_icon">
                    <div class="dash_content">
                        <h3>Views</h3>
                        <p>Number of visited clients</p>
                        <span class="counter">{{ $viewCount }}</span>
                    </div>
                </div>
            </a>
            <a href=" {{ route('dashboard_reports') }} " style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/Report.png') }}" alt="Shared Messages"
                        class="dash_icon">
                    <div class="dash_content">
                        <h3>Reports</h3>
                        <p>Reported users</p>
                        <span class="counter"> {{ $reportCount }} </span>
                    </div>
                </div>
            </a>

            <a href="{{route('dashboard_offense')}}" style="flex: 1;">
                <div class="dash_info">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/banned.png') }}" alt="Comments" class="dash_icon">
                    <div class="dash_content">
                        <h3>Offense</h3>
                        <p>Banned Users</p>
                        <span class="counter"> {{ $OffenseCount }} </span>
                    </div>
                </div>
            </a>
        </div>
        {{-- Dashes 2 --}}

        <hr id="line">

        <div class="Sub_And_Info">
            <div class="Subs">
                <div class="S_N_img_con">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/sub.png') }}" alt="Subscription">
                </div>

                <h2>Subscribed Accounts</h2>
                <span class="counter">0</span>
                <div class="details_con">
                    <button class="details-button">
                        Details
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/details.png') }}" alt="Icon"
                            class="button-icon">
                    </button>
                </div>
            </div>
            <div class="Notes">
                <div class="S_N_img_con">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/note.png') }}" alt="FAQ">
                </div>

                <h2>Notes</h2>
                <span class="counter">0</span>
                <div class="details_con">
                    <button class="details-button">
                        View Notes
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/note_icon.png') }}" alt="Icon"
                            class="button-icon">
                    </button>
                </div>
            </div>
        </div>

        @include('admin.Elements.dashboard_footer')

    </div>

    @include('admin.Responsive.dashboard_content_mobile')

    <script src="{{ asset('assets/JS/Admin/Management_containers.js') }}"></script>
@endauth
@guest
    @include('errors.404')
@endguest
