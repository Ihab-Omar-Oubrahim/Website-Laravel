<div id="profileModal" class="profile-modal">
    <div class="profile-content" id="profile_section">
        <div class="profile-con" id="profile-con">
            <span class="close-btn" onclick="toggleProfile(event)">&times;</span>
            <div class="profile-img-con">
                <img src="{{ Auth::user()->getImageURL() }}" alt="pfp" id="profile-pic"
                    data-username="{{ Auth::user()->name }}" onclick="Profile()">
            </div>
            <h2 id="profile-name">{{ Auth::user()->name }}</h2>
            <h4 id="profile-id"> #{{ (string) Auth::user()->user_id }}</h4>
            <h3 id="profile-email">{{ Auth::user()->email }}</h3>

            <div class="Other-Profile-Elements">

                <div class="Bio-con">
                    <p id="Bio"> {{ Auth::user()->bio }} </p>
                </div>
                <div class="divider">.</div>
                <div class="Other-info-con">
                    <ul>
                        <li class="info-item" id="edit-info-item">
                            <img src="{{ asset('assets/res/location.png') }}" alt="location" class="info-icon">
                            <span class="info-label">Location:</span>
                            <p id="Location"> {{ Auth::user()->profile->location }} </p>
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/gender.png') }}" alt="gender" class="info-icon">
                            <span class="info-label">Gender:</span>
                            <p id="Gender"> {{ Auth::user()->profile->gender }} </p>
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/calendar.png') }}" alt="birthdate" class="info-icon">
                            <span class="info-label">Birthdate:</span>
                            <p id="BirthDate"> {{ Auth::user()->profile->birthdate }} </p>
                        </li>
                        <li class="info-item">
                            <img src="{{ asset('assets/res/building.png') }}" alt="company" class="info-icon">
                            <span class="info-label">Company:</span>
                            <p id="Company"> {{ Auth::user()->profile->company_name }} </p>
                        </li>
                    </ul>
                </div>
            </div>

            @if (Auth::id() === (string) Auth::user()->user_id)
                <div class="Options">
                    <p id="edit-link"> <a href="" onclick="ToggleEditSection(event)"> Edit Profile </a> </p>
                </div>
            @else
                <h2> you're not the account's owner </h2>
            @endif

        </div>

        <div class="Solution" id="Edit-P-Sol" style="display: none;">
            @include('Potato.Account.edit-profile')
        </div>
    </div>
</div>

<script src="{{ asset('assets/JS/Scripts/Web_Pages/Edit_Profile/profile_section.js') }}"></script>
