@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/accounts.css') }}">


@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/accounts.png') }}" alt="dashboard_logo"
                                class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title">Users Accounts </h1>
                            <p class="header_description">View all users accounts </p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar -->
                    <div class="dashboard_header_right">
                        <form method="GET" action="{{ route('users.search') }}"
                            class="search_container form-prevent-multiple-submit" autocomplete="off">
                            <input type="text" class="search_bar" placeholder="Search by username" name="query"
                                id="search_bar" />
                            <button class="search_btn prevent-multiple-submits-search" type="submit" id="searchButton"
                                data-action="search_sharedMSG" {{-- Data Action Type --}}>
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
                        @forelse ($usersAccount as $userAccount)
                            <div class="Users_Row">
                                <div class="users_id_checkbox">
                                    <input type="checkbox" class="edit_checkbox" id="checkbox_{{ $userAccount->user_id }}"
                                        data-id="{{ $userAccount->user_id }}" value="{{ $userAccount->user_id }}" />
                                    <label for="checkbox_{{ $userAccount->user_id }}" class="custom_checkbox"></label>
                                </div>
                                <div class="users_img">
                                    @if ($userAccount->user_id)
                                        <img src="{{ $userAccount->getImageURL() }}" alt="valid_user">
                                    @else
                                        <img src="{{ asset('assets/res/Admin_Res/sidebar_res/unknown.png') }}"
                                            alt="unknown_user">
                                    @endif
                                </div>
                                <div class="users_info">
                                    <p id="users_name">
                                        {{ $userAccount->user_id ? $userAccount->name : 'Unknown' }}
                                    </p>
                                    <p id="users_id">
                                        {{ $userAccount->user_id ? $userAccount->user_id : 'Unknown_ID' }}
                                    </p>
                                </div>

                                <div class="users_view_details">
                                    <a href="{{ route('dashboard_users_details', ['user_id' => $userAccount->user_id]) }}"
                                        class="users_details_button">
                                        View Details
                                    </a>
                                </div>

                            </div>
                        @empty
                            <div class="Empty_Users">
                                <p> No Visitors </p>
                            </div>
                        @endforelse
                    </div>

                </div>

                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>

    {{-- Delete Confirmation For Users --}}
    @include('admin.Confirmations.Delete_User_Confirmation')
    {{-- Delete Confirmation For Users --}}

@endauth
@guest
   @include('errors.404')
@endguest

