const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('log_password');
togglePassword.addEventListener('click', function () {
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
    this.innerHTML = type === 'password' ? '<i class="far fa-eye-slash"></i>' :
        '<i class="far fa-eye"></i>';
});
