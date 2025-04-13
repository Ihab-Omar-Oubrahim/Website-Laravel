@include('Potato.Layout.headInfo')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/user_details.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/dashboard_buttons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/Popup Credentials/popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/Popup Credentials/popup_delete.css') }}">


{{-- for sharedMsg page --}}

@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        @include('Potato.Tools.SuccessMessage')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ $user->getImageURL() }}" alt="user_pfp" class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title"> {{ $user->name }}'s details </h1>
                            <p class="header_description">viewing {{ $user->name }}'s account </p>
                        </div>
                    </div>

                    <!-- Right Section: Search Bar
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
                                                                            -->
                </div>

                <form action="{{ route('dashboard_save_account', ['user' => $user->user_id]) }}" method="POST"
                    enctype="multipart/form-data" class="dashboard_rows_body" id="dashboardContainer" autocomplete="off">
                    @csrf
                    <div class="user_header">
                        <div class="user_image">
                            <div class="image_container" onclick="triggerFileInput()">
                                <img id="userImage" src="{{ $user->getImageURL() }}" alt="user_image">
                            </div>
                            <div class="user_img_change">
                                <button onclick="triggerFileInput()" type="button">
                                    Modify Image <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <input type="file" id="imageInput" accept="image/*" style="display: none;"
                                onchange="previewImage(event)" name="image">
                        </div>


                        <div class="user_info">

                            <fieldset>
                                <legend>Username</legend>
                                <input type="text" placeholder="Username" value="{{ $user->name }}" name="name">
                            </fieldset>

                            <fieldset>
                                <legend>E-Mail</legend>
                                <input type="text" placeholder="E-Mail" value="{{ $user->email }}" name="email">
                            </fieldset>

                        </div>

                    </div>

                    <div class="user_important_info">

                        <fieldset>
                            <legend>Password</legend>
                            <input type="text" placeholder="User-Password" value="{{ $user->password }}" name="password"
                                class="User_Password" readonly>
                            <p id="password_note"> User password is encrypted, it cannot be revealed but can be changed</p>
                        </fieldset>

                        <fieldset>
                            <legend>User-ID</legend>
                            <input type="text" placeholder="User-Password" value="{{ $user->user_id }}" name="user_id"
                                class="User_Password">
                            <p id="password_note"> changing the user ID may cause issues</p>
                        </fieldset>

                        <div class="important_info_options">
                            <button class="dashboard-btn edit-credentials-btn" type="button" onclick="openPopup()">
                                <i class="fas fa-user-edit"></i> Edit Credentials
                            </button>
                        </div>

                    </div>

                    <div class="user_social_info">

                        <div class="user_bio_container">
                            <fieldset>
                                <legend>User-Bio</legend>
                                <textarea placeholder="Empty Bio" name="bio"> {{ $user->bio }} </textarea>
                            </fieldset>
                        </div>


                        <div class="user_other_social_info_container">
                            <fieldset>
                                <legend>User gender</legend>
                                <input type="text" placeholder="gender" value="{{ $user->profile->gender }}"
                                    name="gender">
                            </fieldset>
                            <fieldset>
                                <legend>User location</legend>
                                <input type="text" placeholder="location" value="{{ $user->profile->location }}"
                                    name="location">
                            </fieldset>
                            <fieldset>
                                <legend>User birthdate</legend>
                                <input type="text" placeholder="YYYY-MM-DD" value="{{ $user->profile->birthdate }}"
                                    name="birthdate">
                            </fieldset>
                            <fieldset>
                                <legend>User company</legend>
                                <input type="text" placeholder="company name"
                                    value="{{ $user->profile->company_name }}" name="company_name">
                            </fieldset>

                        </div>

                    </div>

                    @if ($user->is_admin)
                        <div class="user_admin_checker">
                            <div class="admin_info">
                                <p> {{ $user->name }} has admin privileges </p>
                                @if (isset($user->admin->created_at))
                                    <p>Staff since - {{ $user->admin->created_at->format('M d Y') }}</p>
                                @else
                                    <p>Staff since - Unknown</p>
                                @endif

                                <div class="staff_details_con">
                                    <button class="dashboard-btn staff-btn" type="button">
                                        <i class="fas fa-user-tie"></i> Staff Details
                                    </button>
                                </div>

                            </div>
                            <div class="admin_img">
                                <img src="{{ asset('assets/res/Admin_Res/dashboard_img.png') }}" alt="staff">
                            </div>
                        </div>
                    @endif


                    <div class="Dashboard_Options">
                        <button class="dashboard-btn save-btn" type="submit">
                            <i class="fas fa-save"></i> Save Options
                        </button>

                        <button class="dashboard-btn print-btn coming-soon" type="button" disabled>
                            <i class="fas fa-print"></i> Print User (Coming Soon)
                        </button>

                        <button class="dashboard-btn delete-btn" type="button"
                            onclick="openUserDeletePopup('{{ $user->user_id }}')">
                            <i class="fas fa-trash-alt"></i> Delete Account
                        </button>




                    </div>
                </form>

                <div class="Offense_Container">
                    @if ($user->is_banned)
                        {{-- Unban user Form  --}}
                        @include('admin.Confirmations.UnBan_User_Confirmation')
                    @else
                        <button class="dashboard-btn ban-btn" type="button"
                            onclick="openUserBanPopup('{{ $user->user_id }}')">
                            <i class="fas fa-gavel"></i> Ban User
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </div>


    @include('admin.Confirmations.Ban_User_Confirmation')

    <!-- Popup Modal -->
    <!-- Dark Background Overlay -->
    <div id="popupOverlay" class="overlay hidden" onclick="closePopup()"></div>

    <!-- Popup Modal to modify password or user_id -->
    <div id="popupModal" class="popup hidden">
        <span class="close_btn" onclick="closePopup()">&times;</span>
        <div class="popup_content">

            <div class="popup_options">
                <a href="javascript:void(0);" onclick="showPasswordModify()">Modify Password</a>
                <a href="javascript:void(0);" onclick="showIDModify()">Modify ID</a>
            </div>


            <!-- Default message -->
            <div class="default_msg_popup_modify">
                <p>Please select either 'Modify Password' or 'Modify ID'</p>
            </div>


            <!-- Hidden divs for modify password -->
            <form method="POST" action="{{ route('dashboard_password_change_option', ['user' => $user->user_id]) }}"
                class="user_password_modify" style="display:none;" autocomplete="off">

                @csrf
                @method('PUT')
                <p> Modify {{ $user->name }}'s password </p>
                <div class="user_password_inputs">
                    <fieldset>
                        <legend> {{ $user->name }}'s new password </legend>
                        <input type="text" placeholder="New Password" name="new_password">
                        @error('new_password')
                            <span class="Err-Msg" style="color: red;">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Password confirmation</legend>
                        <input type="text" placeholder="Confirm Password" name="new_password_confirmation">
                        @error('new_password_confirmation')
                            <span class="Err-Msg" style="color: red;">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <p id="user_password_change_note">Both password fields must match in order to confirm</p>
                </div>
                <div class="user_password_options">
                    <button class="cancel_btn" type="button" onclick="closePopup()">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                    <button class="save_btn" type="submit">
                        <i class="fa fa-check"></i> Change Password
                    </button>
                </div>
            </form>




            {{-- user id change --}}
            <form method="POST" action="{{ route('dashboard_id_change_option', ['user' => $user->user_id]) }}"
                class="user_id_modify" style="display:none;" autocomplete="off">

                @csrf
                @method('PUT')
                <p> Modify {{ $user->name }}'s ID </p>
                <div class="user_id_inputs">
                    <fieldset>
                        <legend> {{ $user->name }}'s current Identification </legend>
                        <input type="text" placeholder="User ID" name="current_user_id" value="{{ $user->user_id }}"
                            readonly>
                    </fieldset>
                    <br>
                    <div class="new_id_con">
                        <fieldset class="EXO">
                            <legend>ID Tag</legend>
                            <input type="text" value="EXO-" readonly>
                        </fieldset>
                        <fieldset class="ID">
                            <legend>New Identification</legend>
                            <input type="text" placeholder="ID characters (8)" name="new_user_id" maxlength="8"
                                required>
                            @error('new_user_id')
                                <span class="Err-Msg" style="color: red;">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    <p id="user_id_change_note">User ID must be in the format EXO-######## (8 characters after EXO-).</p>
                </div>
                <div class="user_password_options">
                    <button class="cancel_btn" type="button" onclick="closePopup()">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                    <button class="save_btn" type="submit">
                        <i class="fa fa-check"></i> Change Identification
                    </button>
                </div>
            </form>





        </div>
    </div>


    @include('admin.Admin_Dashboard_Pages.Details.user_details_delete_option')




@endauth
@guest
    @include('errors.404')
@endguest

{{-- JavaScript Contact --}}
<script src="{{ asset('assets/JS/Admin/SharedMsgs/Shared.js') }}"></script>

<script>
    function openPopup() {
        let popup = document.getElementById("popupModal");
        let overlay = document.getElementById("popupOverlay");

        popup.classList.remove("hidden");
        popup.classList.add("show");

        overlay.classList.add("show"); // Show dark background
    }

    function closePopup() {
        let popup = document.getElementById("popupModal");
        let overlay = document.getElementById("popupOverlay");

        popup.classList.remove("show");
        setTimeout(() => {
            popup.classList.add("hidden");
        }, 300); // Match animation time

        overlay.classList.remove("show"); // Hide dark background
    }
</script>


<script>
    function showPasswordModify() {
        document.querySelector('.default_msg_popup_modify').style.display = 'none';
        document.querySelector('.user_password_modify').style.display = 'block';
        document.querySelector('.user_id_modify').style.display = 'none';
    }

    function showIDModify() {
        document.querySelector('.default_msg_popup_modify').style.display = 'none';
        document.querySelector('.user_id_modify').style.display = 'block';
        document.querySelector('.user_password_modify').style.display = 'none';
    }
</script>

<script>
    function triggerFileInput() {
        document.getElementById('imageInput').click();
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('userImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    document.getElementById("user_id").addEventListener("keydown", function(e) {
        // Prevent deletion of "EXO-" part
        if (this.selectionStart < 4 && (e.key === "Backspace" || e.key === "Delete")) {
            e.preventDefault();
        }
    });

    document.getElementById("user_id").addEventListener("input", function() {
        // Ensure the value always starts with "EXO-"
        if (!this.value.startsWith("EXO-")) {
            this.value = "EXO-";
        }
    });
</script>

<script src="{{ asset('assets/JS/Scripts/tool-script.js') }}"></script>
