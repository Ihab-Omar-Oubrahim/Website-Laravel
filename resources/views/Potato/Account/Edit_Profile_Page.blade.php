@include('Potato.Layout.headInfo')
@include('Potato.Layout.header_for_profile')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Profile/Profile_Page.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Profile/Edit_Profile_Page.css') }}">

<p> Editing Profile </p>

<div class="Profile_Page_Container">
    <form action="{{ route('profile_page_update', ['user_id' => $user->user_id]) }}" method="POST"
        enctype="multipart/form-data" class="form-prevent-multiple-submit">
        @csrf
        @method('PUT')
        <div class="Profile_Info">
            <div class="image-container">
                <!-- Profile Picture with Overlay -->
                <div class="edit-profile-img-con2">
                    <img src="{{ $user->getImageURL() }}" alt="Profile Image" class="profile-image2" id="profile-img2">
                    <div class="image-text-overlay2">Press to Select Image</div>
                    <input type="file" id="fileInput2" accept="image/*" name="edit_image" hidden>
                </div>
                <!-- Display the Selected Image Below
                <div class="display-image-container" id="display-image-container" style="display: none;">
                    <img src="{{ $user->getImageURL() }}" alt="Selected Image Preview" class="display-image"
                        id="display-img">
                </div>
                -->
            </div>

            <div class="profile_user_info">
                <h2 id="username">{{ $user->name }}</h2>
                <h4 id="user_id"> #{{ (string) $user->user_id }}</h4>
                <h3 id="email">{{ $user->email }}</h3>
            </div>
        </div>

        <div class="Profile_Info2">
            <div class="user_bio">
                <textarea name="bio" placeholder="Empty Bio"> {{ Auth::user()->bio }} </textarea>
            </div>

            <div class="Location_And_Details">
                <!-- Left Column: User Location Info -->
                <div class="User_Location_Info">
                    <ul class="location-details">
                        <li class="info-item">
                            <img src="{{ asset('assets/res/location.png') }}" alt="Location" class="info-icon">
                            <span class="info-label">Location:</span>
                            <input type="text" placeholder="Location" id="Input-Location" name="location"
                                value="{{ Auth::user()->profile->location }}">
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/gender.png') }}" alt="Gender" class="info-icon">
                            <span class="info-label">Gender:</span>
                            <input type="text" placeholder="Gender" id="Input-Gender" name="gender"
                                value="{{ Auth::user()->profile->gender }}">
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/calendar.png') }}" alt="Birthdate" class="info-icon">
                            <span class="info-label">Birthdate:</span>
                            <input type="date" placeholder="Birth-Date" id="Input-BirthD" name="birthdate"
                                value="{{ Auth::user()->profile->birthdate }}">
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/building.png') }}" alt="Company" class="info-icon">
                            <span class="info-label">Company Name:</span>
                            <input type="text" placeholder="Company" id="Input-Company" name="company_name"
                                value="{{ Auth::user()->profile->company_name }}">
                        </li>
                    </ul>
                </div>

                <!-- Right Column -->
                <div class="Other_Details">
                    <h3 class="details-title">Account Details</h3>
                    <p class="details-description">Created Account: <span> {{ $user->created_at->format('F d, Y') }}
                        </span> </p>
                    <p class="details-description">{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        @if (Auth::id() === (string) $user->user_id)
            <div class="Saving_Info">
                <button type="submit" id="save-profile-button"
                    class="profile-button prevent-multiple-submits-with-icon" data-action="edit_profile">
                    <span class="button_text">Save Changes</span>
                    <span class="button_icon">
                        <i class="fas fa-save"></i>
                        <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                            style="width: 25px; display: none;" class="loading-image" />
                    </span>
                </button>
            </div>

            <div class="Profile_Access">
                <button type="button" id="edit-profile-button" class="profile-button">
                    <a href="{{ route('Profile_Page', ['name' => $user->name]) }}">
                        <span class="button_text">Your Profile</span>
                        <span class="button_icon"><i class="fas fa-user"></i></span>
                    </a>
                </button>

                <button type="button" id="advanced-options-button" class="profile-button">
                    <a href="{{ route('Advanced') }}">
                        <span class="button_text">Advanced Options</span>
                        <span class="button_icon"><i class="fas fa-gear"></i></span>
                    </a>

                </button>
            </div>
        @else
        @endif

    </form>

</div>

<script src="{{ asset('assets/JS/Scripts/Web_Pages/Edit_Profile/Edit_Profile.js') }}"></script>
@include('Potato.Layout.scriptlinks')
