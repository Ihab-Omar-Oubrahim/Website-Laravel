function viewContactMessage(message, username, userID, title, phoneNumber, createdAt, contactFile, contactID,
    contactTitle) {
    const popup = document.getElementById('popupContainer');

    // Update fields
    document.getElementById('popupUsername').textContent = username || 'N/A';
    document.getElementById('popupUserID').textContent = userID || 'N/A';
    document.getElementById('popupMessage').innerHTML = message || 'No message available';
    document.getElementById('popupTitleField').textContent = contactTitle || 'N/A';
    document.getElementById('popupPhoneNumber').textContent = phoneNumber ? `Phone - ${phoneNumber}` :
        'Phone - N/A';
    document.getElementById('popupCreatedAt').textContent = createdAt || 'N/A';
    document.getElementById('popupID').textContent = `Contact ID - ${contactID || 'N/A'}`;

    // Handle attachments
    const attachmentContainer = document.querySelector('.popup_attachment_con');
    const attachmentImg = document.querySelector('.Attachment_IMG');
    const attachmentInfo = document.querySelector('.Attachment_Info');
    const attachmentTitle = document.querySelector('#attachments'); // Correctly reference the attachment title

    attachmentInfo.innerHTML = '';

    if (contactFile && contactFile !== 'null') {
        attachmentContainer.style.display = 'flex';
        attachmentTitle.style.display = 'block';

        attachmentImg.innerHTML = `<img src="${ASSET_PATHS.attachmentAvailable}" alt="Attachment Available">`;

        const downloadLink = document.createElement('a');
        downloadLink.href = `${ASSET_PATHS.downloadRoute}?file=${contactFile}`;
        downloadLink.textContent = 'Download Attachment';
        downloadLink.classList.add('download-link');

        attachmentInfo.appendChild(downloadLink);
    } else {
        attachmentContainer.style.display = 'none';
        attachmentTitle.style.display = 'none';
    }

    // Show popup
    popup.classList.remove('hidden');
    popup.classList.add('show');
}

function closePopup() {
    const popup = document.getElementById('popupContainer');
    popup.classList.remove('show');
    popup.classList.add('hidden');
}

// JavaScript to handle the "Select All" functionality
document.getElementById('select_all').addEventListener('change', function () {
    const isChecked = this.checked;

    // Select or deselect all contact checkboxes
    document.querySelectorAll('.edit_checkbox').forEach(function (checkbox) {
        checkbox.checked = isChecked;
    });
});

// Optional: Ensure the "Select All" checkbox is updated based on individual checkboxes
document.querySelectorAll('.edit_checkbox').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // Check if all checkboxes are selected
        const allSelected = document.querySelectorAll('.edit_checkbox:checked').length === document
            .querySelectorAll('.edit_checkbox').length;
        document.getElementById('select_all').checked = allSelected;
    });
});


// Delete Contacts Selection //


// Get elements
const selectAllCheckbox = document.getElementById("select_all");
const individualCheckboxes = document.querySelectorAll(".edit_checkbox");
const deleteContactButton = document.querySelector(".delete_contact");
const confirmationPopup = document.getElementById("confirmationPopup");
const confirmButton = document.getElementById("confirmButton");
const cancelButton = document.getElementById("cancelButton");

let selectedContactIds = [];

// Function to toggle the "Select All" checkbox
selectAllCheckbox.addEventListener("change", function () {
    selectedContactIds = [];
    individualCheckboxes.forEach((checkbox) => {
        checkbox.checked = selectAllCheckbox.checked;
        if (selectAllCheckbox.checked) {
            selectedContactIds.push(checkbox.dataset.id);
        }
    });
});

// Update the selectedContactIds array when individual checkboxes are toggled
individualCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            selectedContactIds.push(checkbox.dataset.id);
        } else {
            selectedContactIds = selectedContactIds.filter(id => id !== checkbox.dataset.id);
        }
        // Uncheck "Select All" if any checkbox is unchecked
        selectAllCheckbox.checked = selectedContactIds.length === individualCheckboxes.length;
    });
});

// Show confirmation popup on delete button click
deleteContactButton.addEventListener("click", function () {
    if (selectedContactIds.length > 0) {
        showPopup("Delete Contacts", "Are you sure you want to delete the selected contacts?");
    } else {
        alert("No contacts selected.");
    }
});

// Show popup
function showPopup(title, message) {
    document.getElementById("popupTitle").innerText = title;
    document.getElementById("popupMessage").innerText = message;
    confirmationPopup.classList.add("show");
}

// Close popup
cancelButton.addEventListener("click", function () {
    confirmationPopup.classList.remove("show");
});

// Handle confirmation
confirmButton.addEventListener("click", function () {
    if (selectedContactIds.length > 0) {
        deleteSelectedContacts();
    }
    confirmationPopup.classList.remove("show");
});

// Function to delete selected contacts
function deleteSelectedContacts() {
    fetch("{{ route('contacts.deleteSelected') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({ contact_ids: selectedContactIds }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Reload the page or update the UI to reflect the changes
                alert("Contacts deleted successfully.");
                location.reload();
            } else {
                alert("Failed to delete contacts.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}


















