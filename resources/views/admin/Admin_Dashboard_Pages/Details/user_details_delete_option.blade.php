<div id="confirmationPopup" class="confirm-popup hidden">
    <form class="confirm-popup-content" method="POST" action="{{ route('details_user_delete') }}">
        @csrf
        <input type="hidden" name="id" id="userIDtoDelete">
        <h3 id="popupTitle">Confirmation</h3>
        <p id="popupMessage">This action cannot be undone.</p>
        <div class="confirm-popup-buttons">
            <button id="confirmButton" class="confirm-btn confirm-btn-confirm" type="submit">Confirm</button>
            <button id="cancelButton" class="confirm-btn confirm-btn-cancel" type="button">Cancel</button>
        </div>
    </form>
</div>

<style>
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
        font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
        text-align: center;
        color: #f0f884;
        margin-bottom: 10px;
    }

    #popupMessage {
        font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
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
        font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
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
    function openUserDeletePopup(userId) {
        document.getElementById('userIDtoDelete').value = userId; // Set user ID
        document.getElementById('confirmationPopup').classList.add('show');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const cancelButton = document.getElementById('cancelButton');
        cancelButton.addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('confirmationPopup').classList.remove('show');
        });
    });
</script>

<!-- Delete Button -->
<button class="dashboard-btn delete-btn" type="button"
        onclick="openUserDeletePopup('{{ $user->user_id }}')">
    <i class="fas fa-trash-alt"></i> Delete Account
</button>
