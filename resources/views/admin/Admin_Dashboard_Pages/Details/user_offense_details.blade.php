@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/user_details.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/user_offense_details.css') }}">
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
                            <h1 class="header_title"> {{ $user->name }}'s offense details </h1>
                            <p class="header_description">viewing {{ $user->name }}'s offense </p>
                        </div>
                    </div>


                </div>

                <form action="{{ route('dashboard_save_account', ['user' => $user->user_id]) }}" method="POST"
                    enctype="multipart/form-data" class="dashboard_rows_body" id="dashboardContainer" autocomplete="off">
                    @csrf

                    <div class="user_important_info">
                        <div class="suspended_user_img_con">
                            <img src="{{ $user->getImageURL() }}" alt="user_pfp" />
                        </div>
                        <div class="suspended_user_info_con">
                            <h4> {{ $user->name }} </h4>
                            <p> {{ $user->user_id }} </p>
                        </div>
                        <div class="offense_container">
                            <div class="offense_details">
                                <div class="offense_img_container">
                                    <img src="{{ asset('assets/res/suspension/block.png') }}" alt="banned">
                                </div>

                                <div class="offense_details_info">
                                    <h2>Suspension Details</h2>

                                    <p><strong>Reason:</strong> {{ $user->offense->reason ?? 'No reason provided' }}</p>


                                    <p><strong>Suspended On:</strong>
                                        {{ \Carbon\Carbon::parse($user->offense->created_at)->format('F jS, Y') ?? 'Unknown Date' }}
                                    </p>
                                    <p><strong>Time Passed:</strong>
                                        {{ \Carbon\Carbon::parse($user->offense->created_at)->diffForHumans() ?? 'Unknown' }}
                                    </p>
                                </div>
                            </div>

                            <div class="user_offenses_con"></div>
                        </div>
                    </div>



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

            </div>
        </div>
    </div>


    <!-- Popup Modal -->
    <!-- Dark Background Overlay -->


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
