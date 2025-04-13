<div class="Left-Mid">
    <h2 id="Left-M-Title"> {{ $homeLandingIntroText->Intro_title }} </h2>
    <p id="Left-M-Desc"> {{ $homeLandingIntroText->Intro_paragraph_1 }} </p>


    <div class="Mid-Elements">

        <div class="Elements-S1">

            <div class="Img-con">
                <div class="Image">
                    <img src="{{ $homeLandingIntroText->getIntroImage1URL() }}?v={{ $homeLandingIntroText->updated_at->timestamp }}"
                        alt="Gamer" id="I-1">
                </div>
                <p id="Img-con-desc"> Gamer </p>
            </div>

            <div class="Img-con">
                <div class="Image">
                    <img src="{{ $homeLandingIntroText->getIntroImage2URL() }}?v={{ $homeLandingIntroText->updated_at->timestamp }}"
                        alt="Developer" id="I-1">
                </div>
                <p id="Img-con-desc"> Developer </p>
            </div>


            <div class="Elements-S2">
                <p> {{ $homeLandingIntroText->Intro_paragraph_2 }}</p>
            </div>
            <div class="Button-Containers">
                <button id="B1" onClick="window.location.href='{{ route('About_Me') }}';">
                    {{ $homeLandingIntroText->Intro_button_text_1 }}
                </button>
            </div>
        </div>
    </div>
</div>
<div class="Right-Mid">
</div>
