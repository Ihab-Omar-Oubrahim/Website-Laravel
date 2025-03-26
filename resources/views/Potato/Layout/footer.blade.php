<div class="F-One">
    <div class="F-Section1">
        <div class="F-imgCon">
            <img src="{{ asset('assets/res/LogoTemp.png') }}" alt="Footer-Logo" id="f-logo">
        </div>
        <h2 id="F-Title"> Title </h2>
        <p id="F-Parag"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam fugiat hic quis eos.
            Dolores.
            Repellat repudiandae at porro. Odio repellendus unde expedita ad nobis officiis, id sapiente
            perferendis?
            Commodi, voluptate unde aliquid eligendi temporibus officiis doloremque! Minus, tenetur sapiente.
            Libero. </p>
    </div>

    <div class="F-Section2">
        <div class="FS2-Left">
            <h3 id="F2-Title"> PotatoWeb Info </h3>
            <li id="info-link"><a href="{{ route('About_Me')}} "> About Me</a></li>
            <li id="info-link"><a href="{{ route('Contact')}} "> Contact</a></li>
            <li id="info-link"><a href="{{ route('Services')}} "> Services</a></li>
            <li id="info-link"><a href="#"> Settings </a></li>
        </div>
        <div class="FS2-Right">
            <h3 id="F2-Title"> Career & Support </h3>
            <li id="info-link"><a href="#"> Projects </a></li>
            <li id="info-link"><a href="#"> Development</a></li>
            <li id="info-link"><a href="#"> Donation </a></li>
        </div>




    </div>

    <div class="F-Section3">

        @include('Potato.Forms.SubEmail')

        <div class="Sub-img-con2">
            <img src="{{ asset('assets/res/footer_potato.png') }}" alt="Subscribe">
        </div>

    </div>
</div>
<div class="F-Two">
    <div class="CopyRight">
        <hr id="f-line">
        <p id="CP-Text"> &copy; 2024-2025 PotatoWeb. All rights reserved. </p>
    </div>
</div>
