@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/contact_rows.css') }}"> {{-- for contact page --}}

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
                            <h1 class="header_title">Contacts Dashboard (Beta v.2) </h1>
                            <p class="header_description">Manage your contacts seamlessly</p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar -->
                    <div class="dashboard_header_right">
                        <form method="GET" action="{{ route('contacts.search') }}"
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
                    @forelse ($contacts as $contact)
                        <div class="dashboard_row_item">
                            <div class="dashboard_row_selection">
                                <input type="checkbox" class="edit_checkbox" data-id="{{ $contact->id }}"
                                    value="{{ $contact->id }}" />
                            </div>

                            {{-- Contact Table Columns --}}

                            <div class="contact_user_pfp">
                                <img src="{{ $contact->user->getImageURL() }}" alt="User" />
                            </div>

                            <div class="contact_row_id">
                                <p> {{ $contact->id }} </p>
                            </div>

                            <div class="contact_info">
                                <p class="contact_name"> {{ $contact->user->name }} </p>
                                <p class="contact_user_id">{{ $contact->user->user_id }}</p>
                            </div>

                            <div class="contact_phone">
                                @if ($contact->phone_number)
                                    <p>{{ $contact->phone_number }}</p>
                                @else
                                    <p>Invalid Number</p>
                                @endif
                            </div>

                            <div class="contact_attachment">
                                @if ($contact->contact_file)
                                    <!-- Check if file exists -->
                                    <img src="{{ asset('assets/res/Admin_Res/Attachment/Attachment_Yes.png') }}"
                                        alt="Attachment Available" />
                                @else
                                    <img src="{{ asset('assets/res/Admin_Res/Attachment/Attachment_No.png') }}"
                                        alt="No Attachment" />
                                @endif
                            </div>

                            {{-- Contact Table Columns --}}

                            <div class="dashboard_row_view">
                                <button class="view_button"
                                    onclick="viewContactMessage(
                                        `{{ str_replace("\n", '<br>', $contact->contact_message) }}`,
                                        '{{ $contact->user->name }}',
                                        '{{ $contact->user->user_id }}',
                                        '{{ $contact->title }}',
                                        '{{ $contact->phone_number }}',
                                        '{{ $contact->created_at }}',
                                        '{{ $contact->contact_file }}',
                                        '{{ $contact->id }}',
                                        '{{ $contact->contact_title }}'
                                    )">
                                    View
                                </button>
                            </div>
                        </div>
                    @empty
                        <p> No Messages </p>
                    @endforelse

                    <!-- Pagination Links -->
                    <div id="paginationContainer" class="pagination_container">
                        {{ $contacts->links() }}
                    </div>
                </div>

                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>


    {{-- For Contact Page --}}

    <div id="popupContainer" class="popup hidden">
        <span class="close_btn" onclick="closePopup()">&times;</span>
        <div class="popup_header">
            <h2 id="popupTitle">Contact Details</h2>
            <p id="popupID"><strong>Contact ID - </strong> N/A</p>
        </div>
        <div class="popup_content">
            <div class="user_popup_info">
                <div class="user_img">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="IMG">
                </div>
                <div class="user_info">
                    <p id="popupUsername"> Username </p>
                    <p id="popupUserID"> user_id </p>
                    <p id="popupPhoneNumber"><strong>Phone - </strong> N/A</p>
                </div>
            </div>
            <div class="popup_contact_title">
                <p id="popupTitleField"><strong></strong> N/A</p>
            </div>
            <div class="popup_contact_message">
                <p id="popupMessage">Contact Message</p>
            </div>
            <h3 id="attachments">Attachments</h3>
            <div class="popup_attachment_con" style="display: none;">
                <div class="Attachment_IMG"></div>
                <div class="Attachment_Info"></div>
            </div>
            <p id="popupCreatedAt"><strong>Created At:</strong> N/A</p>
        </div>
    </div>
    {{-- Delete Confirmation For Contact --}}
    @include('admin.Confirmations.Delete_Contact_Confirmation')
    {{-- Delete Confirmation For Contact --}}

    {{-- For Contact Page --}}


@endauth
@guest
    @include('errors.404')
@endguest

{{-- Download Contact Attachment For Contact --}}
<script>
    const ASSET_PATHS = {
        attachmentAvailable: "{{ asset('assets/res/Admin_Res/Attachment/Attachment_Yes.png') }}",
        downloadRoute: "{{ route('attachment.download') }}"
    };
</script>

{{-- JavaScript Contact --}}
<script src="{{ asset('assets/JS/Admin/Contacts/Contacts.js') }}"></script>
