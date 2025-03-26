<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/Contact.css') }}">
@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')

@auth
    <div class="contact_con">
        <div class="contact_img_con">
            <img src="{{ asset('assets/res/contact_email.png') }}" id="contact_img1">
        </div>
        <h2> Contact Me </h2>
        <form action="{{ route('Contact') }}" method="POST" enctype="multipart/form-data" class="Contact_Form form-prevent-multiple-submit"
            autocomplete="off">
            @csrf
            <input type="text" name="username" placeholder="Username" value="{{ Auth::user()->name }}" readonly
                id="Username">
            @error('username')
                <span>{{ $message }}</span>
            @enderror

            <input type="email" name="email" placeholder="Your Email" value="{{ Auth::user()->email }}" readonly
                id="Email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror

            <input type="phone" name="phone_number" placeholder="Phone number (Optional)" id="Phone">
            @error('phone_number')
                <span>{{ $message }}</span>
            @enderror

            <input type="text" name="contact_title" placeholder="Enter the subject of your contact" id="Title">
            @error('contact_title')
                <span>{{ $message }}</span>
            @enderror

            <textarea name="contact_message" id="con_Message" cols="30" rows="10" placeholder="Write Your Message..."></textarea>
            @error('contact_message')
                <span>{{ $message }}</span>
            @enderror

            <div class="file-upload-container">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fas fa-paperclip"></i> Upload Attachment
                </label>
                <input id="file-upload" type="file" name="contact_file">
                <div class="preview-con" id="preview-con">
                    <div id="file-preview" class="file-preview"></div>
                    <div class="file-name" id="file-name"></div>
                </div>

            </div>
            <span class="file-error" style="color: red; font-size: 0.9em;"></span>
            @error('contact_file')
                <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror

            <div class="button-con">
                <button type="submit" id="Contact_Button_Send" class="prevent-multiple-submits-with-icon"
                data-action="contact_msg">
                    <span class="button_text" id="buttonText">Send Message</span>
                    <span class="button_icon">
                        <i class="fas fa-envelope" id="envelopeIcon"></i>
                        <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                        style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
                    </span>
                </button>
            </div>

            <div class="Contact-Message {{ session('contact_message') ? 'show' : '' }}">
                <p>{{ session('contact_message') }}</p>
            </div>
        </form>
    </div>
@endauth

@guest
    <div class="contact_con">
        <div class="login-message">
            <p style="margin-top: 20px;">You need to log in to send a message.</p>
            <div class="guest_login_container" style="display: flex; align-items: center; justify-content: center;">
                <a href="{{ route('login') }}">
                    <button id="Guest_Login_Button" style="display: block;">Login</button>
                </a>
            </div>
        </div>
        <form action="{{ route('Contact') }}" method="POST" enctype="multipart/form-data" class="Contact_Form">
            <h2> Contact Me </h2> <br>
            <input type="text" placeholder="Username" value="Username" readonly id="Username">
            <input type="email" placeholder="Your Email" value="123xyz@email.com" readonly id="Email">
            <input type="phone" placeholder="Phone number (Optional)" id="Phone">
            <input type="text" placeholder="Enter the subject of your contact" id="Title">
            <textarea id="con_Message" cols="30" rows="10" placeholder="Write Your Message..."></textarea>
            <div class="button-con">
                <button type="button">
                    <span class="button_text"> Send Message </span>
                    <span class="button_icon"><i class="fas fa-envelope"></i></span>
                </button>
            </div>
        </form>
    </div>
    <style>
        .Contact_Form {
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
            left: 15%;
            z-index: 1;
            width: 70%;
            margin: 0;
            box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.25);
        }

        .login-message p {
            color: rgb(199, 199, 157);
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
    </style>
@endguest

<div class="Contact_Info">
    <div class="contact_email">
        <div class="contact_img_con2">
            <img src="{{ asset('assets/res/contact_email2.png') }}" id="contact_img2">
        </div>
        <h2>My E-Mail</h2>
        <p>If you would prefer, you can reach out to me directly via email:</p>
        <p><strong>Email:</strong> <a href="mailto:IhabOmar20@Outlook.com">IhabOmar20@Outlook.com</a></p>
        <p>I look forward to hearing from you!</p>
    </div>
    <div class="contact_items">
        <h2>Contact Information</h2>
        <p>You can upload files with a maximum size of <strong>16 MB</strong>.</p>
        <p>The contact section is meant for private conversations.
            Please feel free to share your subject comfortably,
            knowing your information is handled with care.</p>
        <p>I'm happy to give my full attention to your inquiries and will reach out as quickly as possible.</p>
        <p>Rest assured, your private information will remain safe and secure with me.</p>
    </div>
</div>

<div class="Footer" id="Footer">
    @include('Potato.Layout.footer')
</div>

@include('Potato.Layout.scriptlinks')
<script src="{{ asset('assets/JS/Scripts/User_Contact_files_display_script.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/Pages/Contact_Page.js') }}"></script>
