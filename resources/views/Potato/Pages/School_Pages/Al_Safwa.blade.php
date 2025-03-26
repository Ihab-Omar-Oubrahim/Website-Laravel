@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/School_CSS/Safwa.css') }}">

<div class="School_Con">
    <div class="School_header">
        <div class="School_Logo">
            <a href="https://annuaire-gratuit.ma/ecoles-privees/assafoua-s231050.html"> <img src="{{ asset('assets/res/Schools/Safwa.jpg') }}" alt="Ordiciel">
            </a>
        </div>
        <div class="Header_Info">
            <h2 id="Ordiciel_Title">Al-Safwa</h2>
            <p id="Ordiciel_desc"> Private School </p>
        </div>
    </div>
    <hr style="margin-top: 10px">
    <div class="School_Body">
        <div class="left">
            <p>
                I started my studies at <span class="highlight">AL-AMANA</span>, but I completed my bachelor's degree at
                <span class="highlight">AL-SAFWA</span> in my final year. My field of study was <span class="highlight">Physics in French</span>
                before transitioning to become a <span class="highlight">Specialized Technician</span> in <span class="important">Software Engineering</span>.
            </p>
        </div>

        <div class="right">
            <p><i class="fa fa-map-marker"></i> Location: <span class="info"> Boulevard Allal Al Fassi Hay Salam -
                    Bettana </span></p>
            <p><i class="fa fa-phone"></i> Contact: <span class="info">+212 537+808434</span></p>
          {{--  <p><i class="fa fa-envelope"></i> Email: <span class="info">no mail</span></p>   --}}
        </div>
    </div>
    {{--
    <div class="School_Diplomat">
        <div class="Diplomat_con"> <img src="{{ asset('assets/res/Diplomat/Bac2.jpg') }}" alt="Bac+2"></div>
        <div class="Diplomat_Info"> test </div>
    </div>
    --}}
</div>

</div>




@include('Potato.Layout.scriptlinks')
