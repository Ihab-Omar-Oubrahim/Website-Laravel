<head>
    @include('Potato.Account.auth_header')
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="Header">
            <div class="img-con"> <a href="{{ route('index') }}"> <img src="{{ asset('assets/res/LogoTemp.png') }}"
                        alt="Logo"> </a></div>
        </div>
        <div class="Form-Con">
            <div class="Auth_Form">
                <form method="post" action="{{ route('register') }}" autocomplete="off">
                    @csrf
                    <h5 class="mt-4"> Create Account </h4>

                        <input type="text" name="name" placeholder="Your name"> <br>
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror

                        <input type="email" name="email" placeholder="Email address"> <br>
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror

                        <input type="password" id="password" name="password" placeholder="Password"> <br>
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror

                        <div class="password-container">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm password">
                            @error('password_confirmation')
                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                            @enderror
                            <span class="toggle-password" id="togglePassword">
                                <i class="far fa-eye-slash"></i>
                            </span>
                        </div> <br>

                        <div class="terms-container">
                            <p> <input type="checkbox" id="agree" name="agree" required> I agree with the <a
                                    href=" {{ route('Terms') }}">Terms and Conditions</a> </p>
                        </div> <br><br>


                        <button type="submit"> Register </button> <br>

                        <p>Already have an account ? <a href="{{ route('login') }}" id="Login_link">Log in</a></p>
                </form>
            </div>
            <div class="Views">
                b
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/JS/Scripts/Web_Pages/Auth/register.js') }}"></script>



</body>

</html>
