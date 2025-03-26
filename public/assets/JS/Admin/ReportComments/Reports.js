function viewSharedMessage(username, userID, sharedTitle, message, createdAt, sharedID) {
    const popup = document.getElementById('popupContainer');

    // Update fields
    document.getElementById('popupUsername').textContent = username || 'N/A';
    document.getElementById('popupUserID').textContent = userID || 'N/A';
    document.querySelector('.shared_title').textContent = sharedTitle || 'N/A';
    document.querySelector('.shared_msg').innerHTML = message || 'No message available';
    document.getElementById('popupCreatedAt').textContent = `Created At: ${createdAt || 'N/A'}`;
    document.getElementById('popupID').textContent = `Row ID - ${sharedID || 'N/A'}`;

    // Show the popup
    popup.classList.remove('hidden');
    popup.classList.add('show');
}

function closePopup() {
    const popup = document.getElementById('popupContainer');

    // Hide the popup
    popup.classList.remove('show');
    popup.classList.add('hidden');
}




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
    fetch("{{ route('contacts.delete_shared') }}", {
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
                alert("Shareds deleted successfully.");
                location.reload();
            } else {
                alert("Failed to delete contacts.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}
