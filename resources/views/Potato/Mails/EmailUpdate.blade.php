<style>
    .EV-container {
        background: #1f1e1e;
        padding: 20px
    }

    p {
        text-align: center;
        color: white;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .Img-con {
        width: 100px;
        height: 100px;
        margin: auto;
        margin-top: 15px;
    }

    #Logo {
        width: 100%;
    }

    #salute span,
    #Text span {
        color: #99a125
    }

    #Text,
    #Info {
        text-align: left;
        line-height: 1.8;
    }

    #Info {
        font-size: 12.5px;
    }

    #Text span {
        text-decoration: underline;
    }

    #CopyRight {
        font-size: 11px;
    }

    .btn-con {
        margin-top: 10px;
        margin-left: 25px;
        width: 190px;
        height: 37px;
        margin-bottom: 25px;
    }

    .styled-button {
        display: inline-block;
        background: rgb(197, 197, 73);
        color: #000000;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: bold;
        outline: none;
        border: none;
        border-radius: 4px;
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 2.5;
        font-size: 13.5px;
        text-decoration: none;
        box-shadow: 0 4px 6px rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .styled-button:hover {
        background: rgb(167, 167, 63);
        transform: scale(1.02);
        box-shadow: 0 6px 8px rgba(255, 255, 255, 0.6);
    }

    .styled-button:focus {
        box-shadow: 0 0 8px 3px rgba(255, 255, 255, 0.8);
    }
</style>

<div class="EV-container">
    <div class="Img-con">
        <img src="{{ $message->embed(storage_path() . '/app/public/Mail/LogoTemp.png') }}" alt="Logo" id="Logo">
    </div>

    <p id="salute"> Hello <span> {{ Auth::user()->name }} </span> </p>

    <hr style="color: white;">

    <p id="Text"> You requested to change your current email <span> {{ Auth::user()->email }} </span> to the new
        following email <span> {{ $newEmail }} </span> </p>

    <p id="Info"> Press the button below to verify and change your email address. </p>

    <div class="btn-con">
        <a href="{{ url('/verify-email-change/' . $token) }}" class="styled-button">
            Verify and Change Email
        </a>
    </div>

    <p id="Info"> In case you did not request this action, please disregard or delete this email. </p>

    <hr style="color: white;">

    <p id="Copyright"> © <?php echo date('Y'); ?> PotatoWeb CopyRight. All rights reserved. </p>


</div>
