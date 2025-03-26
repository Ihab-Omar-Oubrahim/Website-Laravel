function Contact_ShowCase() {
    const container = document.getElementById("container");
    const contactContainer = document.getElementById("contact_container");

    // Ensure the elements exist
    if (!container || !contactContainer) {
        console.error("One or both elements not found.");
        return;
    }

    // Step 1: Fade out the current container by adding the 'fade-out' class
    container.classList.add("fade-out");

    // Step 2: Wait for the fade-out effect to finish (500ms), then hide it
    setTimeout(() => {
        container.style.display = "none"; // Hide the container after the fade-out

        // Step 3: Show the contact container and trigger the fade-in effect
        contactContainer.style.display = "block"; // Make contact container visible
        setTimeout(() => {
            contactContainer.classList.add("fade-in"); // Trigger fade-in effect
        }, 10); // Small delay to allow the display change to apply
    }, 500); // Duration of the fade-out (matching the CSS transition duration)
}
