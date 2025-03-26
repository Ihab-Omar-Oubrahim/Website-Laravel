 // Select both toggle elements
 const togglePassword1 = document.getElementById('togglePassword');
 const togglePassword2 = document.getElementById('togglePassword2');

 // Array of password fields to toggle
 const passwordFields = [
     document.getElementById('input-password'),
     document.getElementById('input-confirm-password')
 ];

 // Function to toggle the password visibility and update both icons
 function togglePasswordVisibility() {
     passwordFields.forEach(passwordField => {
         const type = passwordField.type === 'password' ? 'text' : 'password';
         passwordField.type = type;
     });

     const isPasswordVisible = passwordFields[0].type === 'text';
     const iconClass = isPasswordVisible ? 'far fa-eye' : 'far fa-eye-slash';

     // Update icons for both toggles
     togglePassword1.innerHTML = `<i class="${iconClass}"></i>`;
     togglePassword2.innerHTML = `<i class="${iconClass}"></i>`;
 }

 // Add event listeners to both toggles
 togglePassword1.addEventListener('click', togglePasswordVisibility);
 togglePassword2.addEventListener('click', togglePasswordVisibility);

 document.getElementById("Save-Important-Info").addEventListener("click", () => {
    const popup = document.getElementById("securityPopup");
    popup.classList.add("active"); // Show the popup
});

document.getElementById("closeButton").addEventListener("click", () => {
    const popup = document.getElementById("securityPopup");
    popup.classList.remove("active"); // Hide the popup
});

// Optional: Close popup if user clicks outside of it
window.addEventListener("click", (event) => {
    const popup = document.getElementById("securityPopup");
    if (event.target === popup) {
        popup.classList.remove("active");
    }
});

document.getElementById("Edit-Email").addEventListener("click", () => {
    const popup = document.getElementById("EmailSecurity");
    popup.classList.add("active"); // Show the popup
});

document.getElementById("closeButton2").addEventListener("click", () => {
    const popup = document.getElementById("EmailSecurity");
    popup.classList.remove("active"); // Hide the popup
});

// Optional: Close popup if user clicks outside of it
window.addEventListener("click", (event) => {
    const popup = document.getElementById("EmailSecurity");
    if (event.target === popup) {
        popup.classList.remove("active");
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const emailMessage = document.getElementById('email-message');

    if (emailMessage) {
        // Add the "show" class to trigger animation
        setTimeout(() => {
            emailMessage.classList.add('show');
        }, 100); // Slight delay for effect
    }

    setTimeout(() => {
        emailMessage.style.display = 'none';
    }, 5000);

});

function redirectToProfile() {
    const username = "{{ Auth::user()->name }}"; // Dynamically get the username
    window.location.href = `/${username}/Profile`; // Redirect to the profile page
}
