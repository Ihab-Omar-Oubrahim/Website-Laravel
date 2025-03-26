@include('Potato.Layout.headInfo')
@include('Potato.Layout.header_for_profile')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Profile/Profile_Page.css') }}">

<div class="Profile_Page_Container">
    <div class="Profile_Info">
        <div class="pfp">
            <img src=" {{ $user->getImageURL() }} " alt="pfp" id="profile-pic">
        </div>
        <div class="profile_user_info">
            <h2 id="username">{{ $user->name }}</h2>
            <h4 id="user_id"> #{{ (string) $user->user_id }}</h4>
            <h3 id="email">{{ $user->email }}</h3>
        </div>
    </div>

    <div class="Profile_Info2">
        <div class="user_bio">
            <p> {{ $user->bio }} </p>
        </div>

        <div class="Location_And_Details">
            <!-- Left Column: User Location Info -->
            <div class="User_Location_Info">
                <ul class="location-details">
                    <li class="info-item">
                        <img src="{{ asset('assets/res/location.png') }}" alt="Location" class="info-icon">
                        <span class="info-label">Location:</span>
                        <p id="user-location">{{ $user->profile->location ?? 'Not specified' }}</p>
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/gender.png') }}" alt="Gender" class="info-icon">
                        <span class="info-label">Gender:</span>
                        <p id="user-gender">{{ $user->profile->gender ?? 'Not specified' }}</p>
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/calendar.png') }}" alt="Birthdate" class="info-icon">
                        <span class="info-label">Birthdate:</span>
                        <p id="user-birthdate">
                            {{ \Carbon\Carbon::parse($user->profile->birthdate)->format('F d, Y') ?? 'Not specified' }}
                        </p>
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/building.png') }}" alt="Company" class="info-icon">
                        <span class="info-label">Company Name:</span>
                        <p id="user-company">{{ $user->profile->company_name ?? 'Not specified' }}</p>
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
        <div class="Profile_Access">
            <button type="button" id="edit-profile-button" class="profile-button">
                <a href="{{ route('Edit_Profile_Page', ['user_id' => $user->user_id]) }}">
                    <span class="button_text">Edit Profile</span>
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



</div>


@include('Potato.Layout.scriptlinks')
