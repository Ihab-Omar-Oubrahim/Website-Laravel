<div id="confirmationPopup" class="confirm-popup hidden">
    <form class="confirm-popup-content" method="POST" action="{{ route('delete_offense') }}">
        @csrf
        <input type="text" name="id" id="offenseIdtoDelete">
        <h3 id="popupTitle">Confirmation</h3>
        <p id="popupMessage">This action cannot be undone.</p>
        <div class="confirm-popup-buttons">
            <button id="confirmButton" class="confirm-btn confirm-btn-confirm" type="submit">Confirm</button>
            <button id="cancelButton" class="confirm-btn confirm-btn-cancel" type="button">Cancel</button>
        </div>
    </form>
</div>

<style>
    /* Keep existing styles */
    #offenseIdtoDelete {
        display: block;
    }

    .confirm-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
    }

    .confirm-popup.show {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .confirm-popup-content {
        background: rgb(31, 30, 30);
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        transform: translate(-50%, -50%) scale(0.8);
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        position: absolute;
        top: 50%;
        left: 50%;
    }

    #popupTitle {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        text-align: center;
        color: #f0f884;
        margin-bottom: 10px;
    }

    #popupMessage {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        text-align: center;
        color: #9fa73c;
    }

    .confirm-popup.show .confirm-popup-content {
        transform: translate(-50%, -50%) scale(1);
    }

    .confirm-popup-buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .confirm-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .confirm-btn-confirm,
    .confirm-btn-cancel {
        background-color: #7a8029;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        color: white;
        transition: .24s;
    }

    .confirm-btn-confirm:hover,
    .confirm-btn-cancel:hover {
        background-color: #e7e970;
    }

    .confirm-btn-confirm:active,
    .confirm-btn-cancel:active {
        background-color: #f0ee8e;
        transform: scale(0.9);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButton = document.querySelector('.delete_button');
        const offenseIdtoDelete = document.getElementById('offenseIdtoDelete');
        const checkboxes = document.querySelectorAll('.edit_checkbox');
        const cancelButton = document.getElementById('cancelButton');
        const popup = document.getElementById('confirmationPopup');

        // Handle delete button click
        deleteButton.addEventListener('click', function() {
            const selectedIds = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            if (selectedIds.length === 1) {
                // If exactly one checkbox is selected
                offenseIdtoDelete.value = selectedIds[
                0]; // Set hidden input value to the selected contact ID
                confirm_showPopup(); // Show the popup
            } else if (selectedIds.length > 1) {
                // If more than one checkbox is selected
                offenseIdtoDelete.value = JSON.stringify(
                selectedIds); // Pass selected IDs as a JSON string
                confirm_showPopup();
            } else {
                alert('No offense records selected. Please select one to delete.');
            }
        });

        // Cancel button functionality
        cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            confirm_closePopup();
        });

        // Show the confirmation popup
        function confirm_showPopup() {
            popup.classList.remove('hidden');
            popup.classList.add('show');
        }

        // Close the confirmation popup
        function confirm_closePopup() {
            popup.classList.remove('show');
            popup.classList.add('hidden');
        }
    });
</script>
