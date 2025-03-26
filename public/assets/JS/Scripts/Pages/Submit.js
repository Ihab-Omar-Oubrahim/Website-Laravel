(function () {
    $('.form-prevent-multiple-submit').on('submit', function () {
        const submitButton = $(this).find('.prevent-multiple-submits');
        const loadingImage = submitButton.find('.loading-image');  // Select the loading image
        const action = submitButton.data('action'); // Get the action from the button's data-action attribute

        submitButton.attr('disabled', true);

        // Set the button's text dynamically based on the action
        let buttonText = 'Submitting...'; // Default text

        if (action === 'reply') {
            buttonText = 'Replying...';
        } else if (action === 'submit_main_comment') {
            buttonText = 'Commenting...';
        } else if (action === 'report_comment') {
            buttonText = 'Reporting...';
        } else if (action === 'share_idea') {
            buttonText = 'Submitting...';
        } else if (action === 'edit_profile') {
            buttonText = 'Saving...';
        } else {
            buttonText = 'Submitting...';
        }

        // Show the loading image (if it's not already shown)
        loadingImage.css('display', 'inline-flex');

        // Change the button text without modifying the HTML structure (without touching the image)
        submitButton.contents().filter(function () {
            return this.nodeType === 3; // Node type 3 is text node
        }).first().replaceWith(buttonText);  // Replace the button text node with the updated text
    });









    // The buttons with a fa fa icons //

    (function () {
        $('.prevent-multiple-submits-with-icon').on('click', function () {
            const button = $(this);
            const form = button.closest('form'); // Find the closest form element
            const buttonText = button.find('.button_text'); // Text inside the button
            const buttonIcon = button.find('.button_icon i'); // Font Awesome icon inside the button
            const loadingImage = button.find('.loading-image'); // Loading image
            const action = button.data('action'); // Action type from data-action attribute

            // Disable the button to prevent multiple clicks
            button.attr('disabled', true);

            // Update the button text based on action
            let newButtonText = 'Processing...'; // Default text
            if (action === 'edit_profile') {
                newButtonText = 'Saving...';
            } else if (action === 'submit_form') {
                newButtonText = 'Submitting...';
            } else if (action === 'contact_msg') {
                newButtonText = 'Sending...';
            }

            // Hide the Font Awesome icon and show the loading image
            buttonIcon.css('display', 'none');
            loadingImage.css('display', 'inline-flex');

            // Update the button text
            buttonText.text(newButtonText);

            // Trigger the form submission
            if (form.length) {
                form.submit();
            } else {
                console.error("No form found for this button.");
            }
        });
    })();

    // Loading dashboard Search Buttons //

    (function () {
        $('.prevent-multiple-submits-search').on('click', function () {
            const button = $(this);
            const form = button.closest('form');
            const searchIcon = button.find('.search-icon');
            const loadingImage = button.find('.loading-image');
            const action = button.data('action');

            button.attr('disabled', true);

            if (action === 'search_contacts') {
                let newButtonText = 'Searching...';
                button.contents().filter(function () {
                    return this.nodeType === 3;
                }).first().replaceWith(newButtonText);
            }

            // Hide the search icon and show the loading image
            searchIcon.css('display', 'none');
            loadingImage.css('display', 'inline-flex');

            // Trigger the form submission
            if (form.length) {
                form.submit();
            } else {
                console.error("No form found for this button.");
            }
        });
    })();



    // Loading Email //

    (function () {
        $('.prevent-multiple-submit-email').on('click', function () {
            const button = $(this);
            const form = button.closest('form'); // Find the closest form element
            const loadingContainer = $('.Loading_Email_Con'); // The loading div with the image

            // Disable the button to prevent multiple clicks
            button.attr('disabled', true);

            // Show the loading container
            loadingContainer.css('display', 'block');

            // Update the button text to "Sending Email" instantly
            let baseText = 'Sending Email';
            let dots = '';
            const maxDots = 3;

            button.text(baseText);

            // Start dot animation
            const interval = setInterval(() => {
                if (dots.length < maxDots) {
                    dots += '.';
                } else {
                    dots = ''; // Reset dots after reaching maxDots
                }
                button.text(`${baseText}${dots}`);
            }, 500);

            // Trigger the form submission
            if (form.length) {
                form.submit();
            } else {
                console.error("No form found for this button.");
            }

            // Optional: Stop animation and reset button state after a timeout (e.g., 10 seconds)
            setTimeout(() => {
                clearInterval(interval);
                button.attr('disabled', false);
                button.text('Request E-Mail Change'); // Reset button text
                loadingContainer.css('display', 'none'); // Hide the loading container
            }, 5000); // Adjust timeout duration as needed
        });
    })();








})();
