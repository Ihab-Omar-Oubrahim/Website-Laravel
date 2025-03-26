@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/offense.css') }}">


@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/banned.png') }}" alt="dashboard_logo"
                                class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title">Offense Dashboard</h1>
                            <p class="header_description">Managing offensed users</p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar -->
                    <div class="dashboard_header_right">
                        <form method="GET" action="{{ route('offense.search') }}"
                            class="search_container form-prevent-multiple-submit" autocomplete="off">
                            <input type="text" class="search_bar" placeholder="Search by username" name="query"
                                id="search_bar" />
                            <button class="search_btn prevent-multiple-submits-search" type="submit" id="searchButton"
                                data-action="search_contacts" {{-- Data Action Type --}}>
                                Search
                                <img src="{{ asset('assets/res/Admin_Res/search.png') }}" alt="Search Icon"
                                    class="search_icon">
                                <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                    style="width: 25px; margin-left: 5px; display: none;" class="loading_image" />
                            </button>
                        </form>
                    </div>
                </div>

                <div class="dashboard_row_selections_options">
                    <!-- Checkbox to select all items -->
                    <label class="select_all">
                        <input type="checkbox" id="select_all" class="select_all_checkbox" hidden>
                        <span class="checkmark"></span>
                    </label>

                    <!-- Delete button -->
                    <button class="delete_button">
                        <img src="{{ asset('assets/res/Admin_Res/delete.png') }}" alt="Delete" class="delete_icon">
                    </button>
                </div>

                <div class="dashboard_rows_body" id="dashboardContainer">

                    <div class="Users_Row_Container">
                        @forelse ($offenseUsers as $offenseUser)
                            <div class="Users_Row">
                                <div class="users_id_checkbox">
                                    <input type="checkbox" class="edit_checkbox" id="checkbox_{{ $offenseUser->id }}"
                                        data-id="{{ $offenseUser->id }}" value="{{ $offenseUser->id }}" />
                                    <label for="checkbox_{{ $offenseUser->id }}" class="custom_checkbox"></label>
                                </div>

                                <div class="users_img">
                                    <img src="{{ optional($offenseUser->user)->getImageURL() ?? asset('assets/res/Admin_Res/sidebar_res/unknown.png') }}"
                                        alt="{{ optional($offenseUser->user)->getImageURL() ? 'valid_user' : 'unknown_user' }}">
                                </div>

                                <div class="users_info">
                                    <p id="users_name">
                                        {{ optional($offenseUser->user)->name ?? 'Unknown' }}
                                    </p>
                                    <p id="users_id">
                                        {{ optional($offenseUser->user)->user_id ?? 'Unknown_ID' }}
                                    </p>
                                </div>

                                <div class="users_view_details">
                                    <a href="{{ $offenseUser->user_id ? route('dashboard_offense_details', ['user_id' => $offenseUser->user_id]) : '#' }}"
                                        class="users_details_button">
                                        Offense Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="Empty_Users">
                                <p>No Visitors</p>
                            </div>
                        @endforelse

                    </div>

                </div>

                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>



    {{-- Delete Confirmation For Offense --}}
    @include('admin.Confirmations.Delete_Offense_Confirmation')
    {{-- Delete Confirmation For Offense --}}



@endauth
@guest
    @include('errors.404')
@endguest


{{-- JavaScript Contact --}}
<script src="{{ asset('assets/JS/Admin/Contacts/Contacts.js') }}"></script>
