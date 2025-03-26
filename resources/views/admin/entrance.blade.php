<head>
    @include('Potato.Account.auth_header')
    <link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Login_Admin.css') }}">
    <title>Potato Admin</title>
</head>

<form class="Admin_Account_Con" method="POST" action="{{route('admin.login.post')}}">
    @csrf
    <div class="IMG_con">
        <img src="{{ asset('assets/res/Admin_Res/Admin_Logo.png') }}" alt="Admin_Logo">
    </div>
    <div class="Login_con">
        <input type="text" placeholder="Admin Username" name="username">
        @error('username')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
        <div class="password-wrapper">
            <input type="password" placeholder="Admin Password" name="password" id="password-input">
            <img src="{{ asset('assets/res/Admin_Res/closed_eye.png') }}" alt="Toggle Password Visibility"
                id="toggle-password" class="eye-icon">
        </div>
        @error('password')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
        <div class="button_con">
            <button type="submit">
                Login Admin
                <img src="{{ asset('assets/res/Admin_Res/potato_icon.png') }}" alt="Icon" class="button-icon">
            </button>
        </div>
    </div>
</form>




<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password-input');

    const closedEyePath = "{{ asset('assets/res/Admin_Res/closed_eye.png') }}";
    const openedEyePath = "{{ asset('assets/res/Admin_Res/opened_eye.png') }}";

    togglePassword.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.src = openedEyePath;
        } else {
            passwordInput.type = 'password';
            togglePassword.src = closedEyePath;
        }
    });
</script>
