@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/contact_dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">

@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="contact_container" id="contact_container">
                <div class="contacts_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="contacts_header-left">
                        <div class="contacts_logo_con">
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="contact_logo"
                                class="logo" />
                        </div>
                        <div class="contacts_header-info">
                            <h1 class="header-title">Contacts Dashboard</h1>
                            <p class="header-description">Manage your contacts seamlessly</p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar -->
                    <div class="contacts_header-right">
                        <form method="GET" action="{{ route('contacts.search') }}"
                            class="search-container form-prevent-multiple-submit" autocomplete="off">
                            <input type="text" class="search-bar" placeholder="Search by username" name="query"
                                id="search-bar" />
                            <button class="search-btn prevent-multiple-submits-search" type="submit" id="searchButton"
                                data-action="search_contacts">
                                Search
                                <img src="{{ asset('assets/res/Admin_Res/search.png') }}" alt="Search Icon"
                                    class="search-icon">
                                <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                    style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
                            </button>
                        </form>

                    </div>

                </div>

                <div class="Selections_Options">
                    <!-- Checkbox to select all items -->
                    <label class="select-all">
                        <input type="checkbox" id="select-all" class="select-all-checkbox" hidden>
                        <span class="checkmark"></span>
                    </label>

                    <!-- Delete button -->
                    <button class="delete-contact">
                        <img src="{{ asset('assets/res/Admin_Res/delete.png') }}" alt="Delete" class="delete-icon">
                    </button>
                </div>


                <div class="contacts_body" id="contactsContainer">
                    @forelse ($contacts as $contact)
                        <div class="contact_item">
                            <div class="contact_edit">
                                <input type="checkbox" class="edit_checkbox" data-id="{{ $contact->id }}"
                                    value="{{ $contact->id }}" />
                            </div>

                            <div class="contact_user_pfp">
                                <img src="{{ $contact->user->getImageURL() }}" alt="User" />
                            </div>

                            <div class="contact_row_id">
                                <p> {{ $contact->id }} </p>
                            </div>

                            <div class="contact_info">
                                <p class="contact_name"> {{ $contact->user->name }} </p>
                                <p class="contact_id">{{ $contact->user->user_id }}</p>
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

                            <div class="contact_view">
                                <button class="view_button"
                                    onclick="viewContactMessage(
                                        '{{ $contact->contact_message }}',
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
                    <div id="paginationContainer" class="pagination-container">
                        {{ $contacts->links() }}
                    </div>
                </div>

                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>

    <div id="popupContainer" class="popup hidden">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <div class="popup-header">
            <h2 id="popupTitle">Contact Details</h2>
            <p id="popupID"><strong>Contact ID - </strong> N/A</p>
        </div>
        <div class="popup-content">
            <div class="user-popup-info">
                <div class="user_img">
                    <img src="{{ asset('assets/res/Admin_Res/sidebar_res/contacts.png') }}" alt="IMG">
                </div>
                <div class="user_info">
                    <p id="popupUsername"> Username </p>
                    <p id="popupUserID"> user_id </p>
                    <p id="popupPhoneNumber"><strong>Phone - </strong> N/A</p>
                </div>
            </div>
            <div class="popup-contact-title">
                <p id="popupTitleField"><strong></strong> N/A</p>
            </div>
            <div class="popup-contact-message">
                <p id="popupMessage">Contact Message</p>
            </div>
            <h3 id="attachments">Attachments</h3>
            <div class="popup-attachment-con" style="display: none;">
                <div class="Attachment_IMG"></div>
                <div class="Attachment_Info"></div>
            </div>
            <p id="popupCreatedAt"><strong>Created At:</strong> N/A</p>
        </div>
    </div>
    @include('admin.Confirmations.Delete_Contact_Confirmation')
@endauth
@guest
    eh?
@endguest

<script>
    const ASSET_PATHS = {
        attachmentAvailable: "{{ asset('assets/res/Admin_Res/Attachment/Attachment_Yes.png') }}",
        downloadRoute: "{{ route('attachment.download') }}"
    };
</script>
<script src="{{ asset('assets/JS/Admin/Contacts/Contacts.js') }}"></script>
