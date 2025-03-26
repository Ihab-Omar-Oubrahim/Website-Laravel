<script>
    // Navigation bar Script //
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i');
    const dropDownMenu = document.querySelector('.dropdown_menu')

    toggleBtn.onclick = function() {
        dropDownMenu.classList.toggle('open');
        const isOpen = dropDownMenu.classList.contains('open');
        toggleBtnIcon.classList = isOpen ? 'fa-sharp fa-solid fa-xmark' : 'fa-solid fa-bars'
    }
    // Navigation bar Script //


    // Trigger Animation on Scroll //

    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    return;
                }
                entry.target.classList.remove('in-view');
            });
        });
        const allAnimatedElements = document.querySelectorAll('.animate');
        allAnimatedElements.forEach((element) => observer.observe(element));
    });
    // Trigger Animation on Scroll


    // Slider goals animation //



    // Slider goals animation //
</script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<script src="{{ asset('assets/JS/Scripts/Info.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/Slider.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/Light-Dark.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/profile.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/Pages/Submit.js') }}"></script>


<script>
    // Select elements
    const imageTextOverlay = document.querySelector('.image-text-overlay');
    const fileInput = document.getElementById('fileInput');
    const profileImage = document.querySelector('.profile-image'); // This is the correct img element you want to update
    const displayImage = document.getElementById("Display-Image");
    const selectImage = document.getElementById("display-img");

    // Trigger file input when the overlay text is clicked
    imageTextOverlay.addEventListener('click', () => {
        fileInput.click(); // Trigger the file input click
    });

    // Handle file input change (selecting a new image)
    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                // Update the profile image with the new selected image
                profileImage.src = e.target.result; // Set the new image as the src
                selectImage.src = e.target.result;
            };
            reader.readAsDataURL(file); // Convert the file to data URL
        }
        displayImage.style.display = "block";
    });
</script>
