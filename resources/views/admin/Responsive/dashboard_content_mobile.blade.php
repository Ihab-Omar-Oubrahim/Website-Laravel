<div class="container container_mobile" id="container">
    <div class="mobile_info_container">
        <div class="staff_img">
            <img src=" {{ Auth::user()->getImageURL() }} " alt="staff_pfp">
        </div>
        <div class="staff_name_role">
            <p id="Welcome"> Welcome back </p>
            <p id="staff_name"> {{ Auth::user()->admin->username }} </p>
            <p id="staff_role"> Owner </p>
        </div>

        <div class="user_mobile_items">
            {{-- to fill later --}}
        </div>

        <div class="dashboard_mobile_logo">
            <img src="{{ asset('assets/res/Admin_res/dashboard_img.png') }}" alt="Dashboard Image">
        </div>

    </div>

    <div class="mobile_dashboard_container">
        <div class="mobile_dashes">

            <a href=" {{ route('dashboard_contacts') }} ">
                <div class="mobile_dash_info">
                    <div class="mobile_dash_img_con">
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="Contacts">
                    </div>

                    <div class="mobile_dash_content">
                        <h3>Contacts</h3>
                        <p>Number of saved contacts</p>
                        <span class="counter"> {{ $contactsCount }} </span>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_shared') }} ">
                <div class="mobile_dash_info">
                    <div class="mobile_dash_img_con">
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/shared.png') }}" alt="Shared Messages"
                            class="dash_icon">
                    </div>

                    <div class="mobile_dash_content">
                        <h3>Shared Messages</h3>
                        <p>Total messages shared</p>
                        <span class="counter"> {{ $sharedMsgsCount }} </span>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_comments') }} ">
                <div class="mobile_dash_info">
                    <div class="mobile_dash_img_con">
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/comments.png') }}" alt="Shared Messages"
                            class="dash_icon">
                    </div>

                    <div class="mobile_dash_content">
                        <h3>Comments</h3>
                        <p>User Comments</p>
                        <span class="counter"> {{ $commentsCount }} </span>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_visits') }} ">
                <div class="mobile_dash_info">
                    <div class="mobile_dash_img_con">
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/view.png') }}" alt="Contacts"
                            class="dash_icon">
                        <div class="dash_content">
                        </div>

                        <div class="mobile_dash_content">
                            <h3>Views</h3>
                            <p>Visited Clients</p>
                            <span class="counter"> {{ $viewCount }} </span>
                        </div>
                    </div>
                </div>
            </a>

            <a href=" {{ route('dashboard_reports') }} ">
                <div class="mobile_dash_info">
                    <div class="mobile_dash_img_con">
                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/Report.png') }}" alt="Shared Messages"
                            class="dash_icon">
                    </div>

                    <div class="mobile_dash_content">
                        <h3>Reports</h3>
                        <p>Reported users</p>
                        <span class="counter"> {{ $reportCount }} </span>
                    </div>
                </div>
            </a>

            <div class="mobile_dash_info">
                <div class="mobile_dash_img_con">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/banned.png') }}" alt="Comments"
                        class="dash_icon">
                </div>

                <div class="mobile_dash_content">
                    <h3>Offense</h3>
                    <p>Banned Users</p>
                    <span class="counter"> {{ 0 }} </span>
                </div>
            </div>

        </div>

        <hr id="line">

        <div class="mobile_sub_and_info">

            <div class="mobile_subs">

                <div class="mobile_sub_note_img_con">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/sub.png') }}" alt="Subscription">
                </div>
                <div class="mobile_sub_note_info">
                    <h2>Subscribed Accounts</h2>
                    <span class="counter">0</span>
                    <div class="mobile_sub_notes_details_con">
                        <button class="details-button">
                            Details
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/details.png') }}" alt="Icon"
                                class="button-icon">
                        </button>
                    </div>
                </div>

            </div>

            <div class="mobile_notes">
                <div class="mobile_sub_note_img_con">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/note.png') }}" alt="Subscription">
                </div>
                <div class="mobile_sub_note_info">
                    <h2>Notes</h2>
                    <span class="counter">0</span>
                    <div class="mobile_sub_notes_details_con">
                        <button class="details-button">
                            Details
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/details.png') }}" alt="Icon"
                                class="button-icon">
                        </button>
                    </div>
                </div>
            </div>

        </div>

        @include('admin.Elements.dashboard_footer')

    </div>
