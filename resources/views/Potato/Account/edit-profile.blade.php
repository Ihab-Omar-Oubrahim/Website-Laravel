<span class="close-btn" onclick="toggleProfile(event)">&times;</span>
<div class="edit-profile-con" id="edit-profile-con">
    <form action="{{ route('updateInfo', Auth::id()) }}" method="POST" enctype="multipart/form-data" autocomplete="off"
        class="form-prevent-multiple-submit">
        @csrf
        @method('put')

        <div class="images-containers">
            <div class="edit-profile-img-con">
                <img src="{{ Auth::user()->getImageURL() }}" alt="Profile Image" class="profile-image">
                <div class="image-text-overlay">Press to Select Image</div>
                <input type="file" id="fileInput" accept="image/*" name="image">
            </div>
            <div class="Display-Image" id="Display-Image">
                <img src="{{ Auth::user()->getImageURL() }}" alt="Profile Image" class="display-image" id="display-img">
            </div>
        </div>


        <div class="Other-Profile-Elements" id="Edit-Profile-Elements">

            <div class="Bio-con" id="Edit-Bio-con">
                <textarea name="bio" id="Edit-Bio" placeholder="Empty Bio"> {{ Auth::user()->bio }} </textarea>
                @error('bio')
                    <span class="text-danger fs-6"> {{ $message }} </span>
                @enderror
            </div>
            <div class="divider" id="edit-divider">.</div>
            <div class="Other-info-con" id="Edit-Other-info-con">
                <ul id="edit-ul">
                    <li class="info-item">
                        <img src="{{ asset('assets/res/location.png') }}" alt="location" class="info-icon">
                        <span class="info-label">Location:</span> <input type="text" placeholder="Location"
                            id="Input-Location" name="location" value="{{ Auth::user()->profile->location }}">
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/gender.png') }}" alt="gender" class="info-icon">
                        <span class="info-label">Gender:</span> <input type="text" placeholder="Gender"
                            id="Input-Gender" name="gender" value="{{ Auth::user()->profile->gender }}">
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/calendar.png') }}" alt="birthdate" class="info-icon">
                        <span class="info-label">Birthdate:</span> <input type="date" placeholder="Birth-Date"
                            id="Input-BirthD" name="birthdate" value="{{ Auth::user()->profile->birthdate }}">
                    </li>
                    <li class="info-item">
                        <img src="{{ asset('assets/res/building.png') }}" alt="company" class="info-icon">
                        <span class="info-label">Company:</span> <input type="text" placeholder="Company"
                            id="Input-Company" name="company_name" value="{{ Auth::user()->profile->company_name }}">
                    </li>
                </ul>
            </div>
        </div>
        <div id="Edit-Save-Info">
            <button type="submit" id="Save-Important-Info" class="Profile_Save prevent-multiple-submits-with-icon"
                data-action="edit_profile">
                <span class="button_text"> Save Info </span>
                <span class="button_icon">
                    <i class="fas fa-save"></i>
                    <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                        style="width: 25px; display: none;" class="loading-image" />
                </span>

            </button>
            <p id="Advanced"> <a href="{{ route('Advanced') }}">Advanced Options</a> </p>
        </div>
    </form>

    @if (Auth::id() === (string) Auth::user()->user_id)
        <div class="Options">
            <p id="edit-link"> <a href="" onclick="ToggleEditSection(event)"> View Profile </a> </p>
        </div>
    @else
        <h2> you're not the account's owner </h2>
    @endif

</div>
