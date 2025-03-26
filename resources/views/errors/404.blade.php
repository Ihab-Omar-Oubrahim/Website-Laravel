@include('Potato.Layout.headInfo')
<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/404.css') }}">

<div class="div_404_con">
    <div class="div_404_left">

        <div class="Four_O_Four">
            <h1> <span id="Four_1">4</span> <span id="O_2">0</span> <span id="Four_3">4</span> </h1>
        </div>

        <h1 id="uhoh"> Uh Oh...</h1>
        <div class="line_404"></div>
        <h4 id="desc_404"> It seems that you've been lost friend,
            maybe we should double check our paths
            out there !
        </h4>
        <div class="home_button_con">
            <a href="{{ route('index') }}">
            <button id="Home_Button"> Go back home </button>
            </a>
        </div>
        <div class="road_img_con">
            <img src=" {{ asset('assets/res/404/road.png') }}" alt="">
        </div>
    </div>
    <div class="div_404_right">
        <img src="{{ asset('assets/res/404/404.png') }}" alt="">
    </div>
</div>

