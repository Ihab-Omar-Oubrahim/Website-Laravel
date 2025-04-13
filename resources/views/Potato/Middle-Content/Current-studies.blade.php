<h2 id="Middle2-Title"> {{$homeLandingInfoText->Mega_Title}} </h2>

        <div class="Middle2-Containers">

            <div class="M2-Container1 animate">
                <div class="M2-Image-Taker">
                    <img src="{{$homeLandingInfoText->getLeftInfoImage1()}}" alt="Info Img1" id="M2-IMG-Con">
                </div>
                <div class="M2-Con-Info">
                    <p id="Con-Info-Title"> {{$homeLandingInfoText->mini_title_left_1}} </p>
                    <p id="Con-Info-Desc"> {{$homeLandingInfoText->mini_desc_left_1}}
                    </p>
                </div>
            </div>

            <div class="M2-Container2 animate">
                <div class="M2-Image-Taker">
                    <img src="{{$homeLandingInfoText->getMiddleInfoImage2()}}" alt="Info Img2" id="M2-IMG-Con">
                </div>
                <div class="M2-Con-Info">
                    <p id="Con-Info-Title">  {{$homeLandingInfoText->mini_title_middle_2}} </p>
                    <p id="Con-Info-Desc"> {{$homeLandingInfoText->mini_desc_middle_2}}
                    </p>
                </div>
            </div>

            <div class="M2-Container3 animate">
                <div class="M2-Image-Taker">
                    <img src="{{$homeLandingInfoText->getRightInfoImage3()}}" alt="Info Img3" id="M2-IMG-Con">
                </div>
                <div class="M2-Con-Info">
                    <p id="Con-Info-Title"> {{$homeLandingInfoText->mini_title_right_3}} </p>
                    <p id="Con-Info-Desc"> {{$homeLandingInfoText->mini_desc_right_3}} </p>
                </div>
            </div>

        </div>
