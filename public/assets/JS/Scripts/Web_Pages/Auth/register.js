const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('password_confirmation');

togglePassword.addEventListener('click', function() {
    // Toggle password field type
    const isPasswordHidden = passwordField.type === 'password';
    passwordField.type = isPasswordHidden ? 'text' : 'password';
    confirmPasswordField.type = isPasswordHidden ? 'text' : 'password';

    // Update the icon
    this.innerHTML = isPasswordHidden ?
        '<i class="far fa-eye"></i>' // Icon for visible password
        :
        '<i class="far fa-eye-slash"></i>'; // Icon for hidden password
});
