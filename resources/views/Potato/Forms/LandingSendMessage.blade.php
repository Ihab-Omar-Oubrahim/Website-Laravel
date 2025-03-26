@auth
    <style>
        .error-message {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: red;
            text-align: center !important;
            font-size: 1.1rem;
            margin-top: 10px;
        }
    </style>
    <form action="{{ route('ShareMessage') }}" method="post" autocomplete="off" id="Landing-Form"
        class="form-prevent-multiple-submit">
        @csrf

        <div class="NameLastName">
            <!-- Name Field -->
            <input type="text" id="first-name" name="username" placeholder="Username" value="{{ Auth::user()->name }}"
                readonly />
            @error('username')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Last Name Field
                                <input type="text" id="last-name" name="last-name" required placeholder="Last name" />
                            -->
        </div>

        <div class="EmailPhoneMessage">
            <!-- Email Field -->
            <input type="email" id="E-Mail" name="email" placeholder="E-Mail" value="{{ Auth::user()->email }}"
                readonly /> <br>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Phone Number Field -->
            <input type="text" id="shared-title" name="shared_title" placeholder="Message Title (Optional)" /> <br>

            <!-- Text Area Field -->
            <textarea id="message" name="message" rows="4" placeholder="Enter your message here"></textarea>
        </div> <br>

        <div class="submit-b-con">
            <!-- Submit Button -->
            <button type="submit" id="Submit-Form" class="prevent-multiple-submits" data-action="share_idea">
                Submit
                <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                    style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
            </button>
        </div>

    </form>

    @error('phone')
        <p class="error-message">{{ $message }}</p>
    @enderror
    @error('message')
        <p class="error-message">{{ $message }}</p>
    @enderror
    <script src="{{ asset('assets/JS/Scripts/Pages/HomeLanding_ShareIdea.js') }}"></script>

@endauth

@guest
    <div class="login-message">
        <p style="margin-top: 20px;">You need to log in to send a message.</p>
        <div>
            <a href="{{ route('login') }}">
                <button id="Guest_Login_Button">Login</button>
            </a>
        </div>
    </div>
    <form action="#" method="post" autocomplete="off" id="Landing-Form">
        <div class="NameLastName">
            <input type="text" id="first-name" placeholder="Currently a guest" />
        </div>
        <div class="EmailPhoneMessage">
            <input type="email" id="E-Mail" name="email" placeholder="E-Mail" /> <br>

            <input type="text" id="shared-title" name="shared_title" placeholder="Message Title (Optional)" /> <br>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message here" required></textarea>
        </div> <br>
        <div class="submit-b-con">
            <button type="submit" id="Submit-Form">Submit</button>
        </div>
    </form>
    <style>
        #Landing-Form {
            filter: blur(4px);
            pointer-events: none;
            opacity: 0.5;
            position: relative;
        }

        .login-message {
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 10px;
            height: 69px;
            position: absolute;
            top: 40%;
            left: 10%;
            z-index: 1;
            width: 80%;
            margin: auto;
            box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.25);
        }

        .login-message p {
            color: rgb(199, 199, 157);
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
    </style>
@endguest
