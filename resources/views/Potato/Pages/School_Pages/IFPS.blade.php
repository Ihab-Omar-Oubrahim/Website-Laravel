@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/School_CSS/IFPS.css') }}">

<div class="School_Con">
    <div class="School_header">
        <div class="School_Logo">
            <a href="https://ifps-education.com/"> <img src="{{ asset('assets/res/Schools/IFPS.png') }}" alt="IFPS">
            </a>
        </div>
        <div class="Header_Info">
            <h2 id="Ordiciel_Title">IFPS </h2>
            <p id="Ordiciel_desc"> International Fondation of Professional Studies </p>
        </div>
    </div>
    <hr style="margin-top: 10px">
    <div class="School_Body">
        <div class="left">
            <p>
                Collaborated with <span class="highlight">Ordiciel</span>, where I completed my third year to receive my
                <span class="highlight">Professional Bachelor's Degree</span> in <span class="highlight">Application
                    Design and Development Engineering</span>.
            </p>
        </div>

        <div class="right">
            <p><i class="fa fa-map-marker"></i> Location: <span class="info" id="IFPS_info">Rue de Lausanne 37 | CH-1201
                    GENEVE SUISSE</span></p>
            <p><i class="fa fa-envelope"></i> Email: <span class="info" id="IFPS_info">contact@ifps-education.com</span></p>
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
