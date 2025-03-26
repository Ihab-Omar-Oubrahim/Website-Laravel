@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')

<div class="Edit-Acc-Container">
    <div class="Account-Menu">
        <div class="profile-img-con">
            <img src=" {{ Auth::user()->getImageURL() }} " alt="pfp" id="profile-pic">
        </div>
        <div class="Menu-Info">
            <h2 id="profile-name">{{ Auth::user()->name }}</h2>
            <h4 id="profile-id"> #{{ (string) Auth::user()->user_id }}</h4>
            <h3 id="profile-email">{{ Auth::user()->email }}</h3>

            <hr id="line">

            <div class="Buttons">
                <div class="button-con">
                    <button type="submit" id="Back-Profile" onclick="redirectToProfile()">
                        <span class="button_text"> Your Profile </span>
                        <span class="button_icon"><i class="fas fa-user"></i></span>
                    </button>
                </div>
            </div>

            <div class="NavBar-Mini">
                <div class="Direction">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/res/Edit-Home.png') }}" alt="Home">
                    </a>
                </div>
                <div class="Direction">
                    <a href="{{ route('About_Me') }}">
                        <img src="{{ asset('assets/res/Edit-Info.png') }}" alt="Info">
                    </a>
                </div>
                <div class="Direction">
                    <a href="{{ route('Contact') }}">
                        <img src="{{ asset('assets/res/Edit-Contact.png') }}" alt="Contact">
                    </a>
                </div>
                <div class="Direction">
                    <a href="{{ route('Services') }}">
                        <img src="{{ asset('assets/res/Edit-Services.png') }}" alt="Services">
                    </a>
                </div>
                <div class="Direction">
                    <img src="{{ asset('assets/res/Edit-Option.png') }}" alt="Options">
                </div>
            </div>



        </div>
    </div>
    <div class="edit-inputs-con">
        <div class="inputs-con">
            <fieldset>
                <legend>Account Information</legend>
                <form action="{{ route('updatePassword', Auth::id()) }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off" class="form-prevent-multiple-submit">
                    @csrf
                    @method('put')

                    <input type="text" placeholder="Username" value="{{ Auth::user()->name }}" id="input-name"
                        name="username"> <br>
                    <div class="edit-pass-con">
                        <input type="password" placeholder="New Password" id="input-password" name="new_password">
                        <input type="password" placeholder="Confirm Password" id="input-confirm-password"
                            name="new_password_confirmation">
                        <span class="toggle-password" id="togglePassword">
                            <i class="far fa-eye-slash"></i>
                        </span> <br>
                    </div>
                    <span class="toggle-password" id="togglePassword2" style="display: none;">
                        <i class="far fa-eye-slash"></i>
                    </span>
                    <br>
                    <div class="button-con">
                        <button type="button" id="Save-Important-Info">
                            <span class="button_text"> Save Account </span>
                            <span class="button_icon"><i class="fas fa-user"></i></span>
                        </button>
                    </div>

                    <div class="Email-Section">
                        <input type="email" placeholder="Your Email address" value="{{ Auth::user()->email }}"
                            id="input-email" readonly>
                        <div class="button-con">
                            <button type="button" id="Edit-Email">
                                <span class="button_text"> Modify Email </span>
                                <span class="button_icon"><i class="fas fa-envelope"></i></span>
                            </button>
                        </div>

                    </div>

                    <!-- Security popup for account verification -->
                    <div class="security-popup" id="securityPopup">
                        <div class="security-popup-content">
                            <span class="close-button" id="closeButton">&times;</span>
                            <h2>Account Verification</h2>
                            <input type="password" placeholder="Current Password" id="verificationPassword"
                                name="password">
                            <br>
                            <button type="submit" id="verifyButton" data-action="edit_profile"
                                class="prevent-multiple-submits">
                                Verify
                                <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                    style="width: 25px; display: none;" class="loading-image" />
                            </button>
                            <p>Please enter your current password to verify</p>
                        </div>
                    </div>
                    <!-- Security popup for account verification -->

                    <p id="note"> You must verify your Account by Re-entering your current password in order to
                        save.
                    </p>

                    @error('username')
                        <span class="Err-Msg">{{ $message }}</span>
                    @enderror
                    @error('new_password')
                        <span class="Err-Msg">{{ $message }}</span>
                    @enderror
                    @error('new_password_confirmation')
                        <span class="Err-Msg">{{ $message }}</span>
                    @enderror
                    @error('password')
                        <span class="Err-Msg">{{ $message }}</span>
                    @enderror
                    @error('new_email')
                        <span class="Err-Msg">{{ $message }}</span>
                    @enderror

                    <div class="Email-Message {{ session('update_message') ? 'show' : '' }}">
                        <p>{{ session('update_message') }}</p>
                    </div>



                </form>

                <!-- Email Security popup for account verification -->
                <div class="email-security-popup" id="EmailSecurity">
                    <div class="email-security-popup-content">
                        <span class="close-button" id="closeButton2">&times;</span>
                        <h2>Email Account Verification</h2>
                        <form action="{{ route('VerifyEmail') }}" method="POST" autocomplete="off">
                            @csrf
                            <input type="email" placeholder="Current Email" value="{{ Auth::user()->email }}"
                                id="input-email" readonly name="Current_Email"> <br>
                            <input type="email" placeholder="New E-Mail Adress" id="input-email" name="new_email">
                            <br> <br>

                            <button type="submit" id="ChangeMail" class="prevent-multiple-submit-email">
                                Request E-Mail Change
                            </button>
                            <div class="Loading_Email_Con">
                                <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                    style="width: 100%;" class="loading-image" />
                            </div>
                            <p>An E-Mail verification will be sent through your current Mail</p>
                        </form>

                        <div class="Email-Message {{ session('email_message') ? 'show' : '' }}">
                            <p>{{ session('email_message') }}</p>
                        </div>

                    </div>
                </div>
                <!-- Email Security popup for account verification -->

            </fieldset>
        </div>
    </div>
</div>



<script src="{{ asset('assets/JS/Scripts/Web_Pages/Edit_Profile/Edit_Account_Info.js') }}"></script>
@include('Potato.Layout.JQuery')
