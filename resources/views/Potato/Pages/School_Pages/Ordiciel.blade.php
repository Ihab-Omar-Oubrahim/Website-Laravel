@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/School_CSS/Ordiciel.css') }}">

<div class="School_Con">
    <div class="School_header">
        <div class="School_Logo">
            <a href="https://www.ordiciel.ma"> <img src="{{ asset('assets/res/Schools/Ordiciel.jpg') }}" alt="Ordiciel">
            </a>
        </div>
        <div class="Header_Info">
            <h2 id="Ordiciel_Title">Ordiciel</h2>
            <p id="Ordiciel_desc"> Private School </p>
        </div>
    </div>
    <hr style="margin-top: 10px">
    <div class="School_Body">
        <div class="left">
            <p>
                Where I began studying computer science. I started with <span class="highlight">C
                    programming</span>,
                followed by the basics of <span class="highlight">HTML/CSS</span>, <span class="highlight">.NET (Visual
                    Basic)</span>,
                and later <span class="highlight">Java</span>.
            </p>
            <p>
                I grasped the concepts and continued learning at home, eventually creating a final project using <span
                    class="highlight">Visual Basic</span>
                to develop a <span class="important">school management application</span>.
            </p>
        </div>
        <div class="right">
            <p><i class="fa fa-map-marker"></i> Location: <span class="info">Institut ORDICIEL, 23 Av Chellah, Hassan,
                    Rabat</span></p>
            <p><i class="fa fa-phone"></i> Contact: <span class="info">+212 661-882232</span></p>
            <p><i class="fa fa-envelope"></i> Email: <span class="info">ordiciel@ordiciel.ma</span></p>
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


