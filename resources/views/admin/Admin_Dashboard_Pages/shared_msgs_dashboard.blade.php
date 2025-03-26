@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/sharedMsgs_rows.css') }}">
{{-- for sharedMsg page --}}

@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="dashboard_logo"
                                class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title">Shared Messages </h1>
                            <p class="header_description">View all shared messages from users</p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar -->
                    <div class="dashboard_header_right">
                        <form method="GET" action="{{ route('sharedmsgs.search') }}"
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
                    @forelse ($sharedMsgs as $sharedMsg)
                        <div class="dashboard_row_item">
                            <div class="dashboard_row_selection">
                                <input type="checkbox" class="edit_checkbox" data-id="{{ $sharedMsg->id }}"
                                    value="{{ $sharedMsg->id }}" />
                            </div>

                            {{-- Shared Message Table Columns --}}

                            <div class="sharedmsg_row_id">
                                <p> {{ $sharedMsg->id }} </p>
                            </div>

                            <div class="sharedmsg_row_user_name">
                                <p> {{ $sharedMsg->user->name }}</p>

                            </div>

                            <div class="sharedmsg_row_user_id">
                                <p> {{ $sharedMsg->user->user_id }}</p>

                            </div>


                            {{-- Shared Message Table Columns --}}

                            <div class="dashboard_row_view">
                                <button class="view_button"
                                    onclick="viewSharedMessage(
                                        '{{ $sharedMsg->user->name }}',
                                        '{{ $sharedMsg->user_id }}',
                                        '{{ $sharedMsg->shared_title }}',
                                        `{{ str_replace("\n", '<br>', $sharedMsg->message) }}`,
                                        '{{ $sharedMsg->created_at }}',
                                        '{{ $sharedMsg->id }}',
                                    )">
                                    View Message
                                </button>
                            </div>
                        </div>
                    @empty
                        <p> No Messages </p>
                    @endforelse

                    <!-- Pagination Links -->
                    <div id="paginationContainer" class="pagination_container">
                        {{ $sharedMsgs->links() }}
                    </div>
                </div>

                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>


    {{-- For Shared Message Page --}}

    <div id="popupContainer" class="popup hidden">
        <span class="close_btn" onclick="closePopup()">&times;</span>
        <div class="popup_header">
            <h2 id="popupTitle">Shared Message Details</h2>
            <p id="popupID"><strong>Row ID - </strong> N/A</p>
        </div>
        <div class="popup_content">

            <div class="shared_user_info">
                <div class="user_img">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/shared.png') }}" alt="IMG">
                </div>
                <div class="user_info">
                    <p id="popupUsername"> Username </p>
                    <p id="popupUserID"> user_id </p>
                </div>
            </div>

            <div class="shared_message_info">
                <div class="shared_title_con">
                    <h2 class="shared_title"> Shared Title </h2>
                </div>
                <div class="shared_message_con">
                    <p class="shared_msg"> Shared Title </p>
                </div>
            </div>

            <p id="popupCreatedAt"><strong>Created At:</strong> N/A</p>
        </div>
    </div>

    {{-- Delete Confirmation For Contact --}}
    @include('admin.Confirmations.Delete_Shared_Msg_Confirmation')
    {{-- Delete Confirmation For Contact --}}

    {{-- For Shared Message Page --}}


@endauth
@guest
    @include('errors.404')
@endguest

{{-- JavaScript Contact --}}
<script src="{{ asset('assets/JS/Admin/SharedMsgs/Shared.js') }}"></script>
