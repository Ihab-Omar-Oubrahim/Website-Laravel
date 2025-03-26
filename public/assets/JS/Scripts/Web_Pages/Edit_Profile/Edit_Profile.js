document.addEventListener('DOMContentLoaded', function() {
    const fileInput2 = document.getElementById('fileInput2'); // Hidden file input
    const imageOverlay2 = document.querySelector('.image-text-overlay2'); // The text overlay div

    // Ensure that when the overlay div is clicked, the file input is triggered
    imageOverlay2.addEventListener('click', function() {
        fileInput2.click(); // Trigger file input's click event
    });

    // Handle the file selection event
    fileInput2.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const profileImg2 = document.getElementById(
                    'profile-img2'); // Get the profile image
                profileImg2.src = e.target.result; // Update the image with the selected file
            };

            reader.readAsDataURL(file); // Read the file and display the image
        }
    });
});
