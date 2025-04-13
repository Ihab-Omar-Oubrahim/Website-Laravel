<!-- Ban User Popup -->
<div id="banUserPopup" class="confirm-popup hidden">
    <form class="confirm-popup-content" method="POST"
        action="{{ route('ban_selected_user', ['user_id' => $user->user_id]) }}" style="border-radius: 4px !important;"
        autocomplete="off" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" id="userIDtoBan" value="{{ $user->user_id }}">

        <h3 id="popupTitle">Ban Confirmation</h3>
        <img src="{{ asset('assets/res/Admin_Res/Wooden_Ban_Hammer.png') }}" alt="Ban Icon" class="ban-popup-img">
        <p id="popupMessage"> Banning the following user : {{ $user->name }} </p>
        <input type="text" placeholder="Ban Reason" id="ban_reason_input" name="reason">
        <div class="confirm-popup-buttons">
            <button id="confirmBanButton" class="confirm-btn confirm-btn-confirm" type="submit">Confirm</button>
            <button id="cancelBanButton" class="confirm-btn confirm-btn-cancel" type="button">Cancel</button>
        </div>
    </form>
</div>

<style>
    .confirm-popup-content {
        background: rgb(31, 30, 30);
        padding: 25px;
        border-radius: 4px !important;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        transform: translate(-50%, -50%) scale(0.8);
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
    }

    #ban_reason_input {
        background: rgba(44, 42, 42, 0.432);
        height: 38px;
        border: none;
        outline: none;
        color: rgb(204, 204, 91);
        font-size: 14px;
        border-radius: 4px;
        padding-left: 8px;
        margin-top: 8px;
    }

    #ban_reason_input::placeholder {
        color: rgba(190, 190, 190, 0.699)
    }

    #popupTitle {
        font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
        text-align: center;
        color: #973636 !important;
        margin-bottom: 10px;
        transition: color 0.3s ease-in-out;
        font-size: 12px
    }

    #popupMessage {
        line-height: 1.8rem;
    }

    .ban-popup-img {
        width: 128px;
        height: 128px;
    }

    #popupMessage {
        font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
        text-align: center;
        color: #b04040 !important;
        /* Slightly brighter red */
        transition: color 0.3s ease-in-out;
    }

    .confirm-popup.show .confirm-popup-content {
        transform: translate(-50%, -50%) scale(1);
    }

    /* Buttons Styling */
    .confirm-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px !important;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease-in-out;
        border-radius: 4px !important;
    }

    /* Confirm Button */
    .confirm-btn-confirm {
        background-color: #973636 !important;
        color: white !important;
        border-radius: 4px !important;

    }

    .confirm-btn-confirm:hover {
        background-color: #b04040 !important;
        transform: scale(1.05);
    }

    .confirm-btn-confirm:active {
        background-color: #822d2d !important;
        transform: scale(0.95);
    }

    .confirm-btn-cancel {
        background-color: #822d2d !important;
        color: white !important;
        border-radius: 4px !important;

    }

    .confirm-btn-cancel:hover {
        background-color: #973636 !important;
        transform: scale(1.05);
    }

    .confirm-btn-cancel:active {
        background-color: #6b2424 !important;
        /* Darker Red */
        transform: scale(0.95);
    }
</style>

<!-- JavaScript -->
<script>
    function openUserBanPopup(userId) {
        document.getElementById('userIDtoBan').value = userId;
        document.getElementById('banUserPopup').classList.add('show');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const cancelButton = document.getElementById('cancelBanButton');
        cancelButton.addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('banUserPopup').classList.remove('show');
        });
    });
</script>
