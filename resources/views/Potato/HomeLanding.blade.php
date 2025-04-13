@include('Potato.Layout.headInfo')

<body>
    @include('Potato.Layout.header')
    @include('Potato.Tools.SuccessMessage')

    <div class="Middle">

        @include('Potato.Middle-Content.Intro-content')

    </div>

    <div class="Middle2">

        @include('Potato.Middle-Content.Current-studies')

    </div>

    <div class="Middle-Form-Container">

        <div class="Info-Form">
            <div class="Logo-IF-Con">
                <img src="{{$homeLandingIdeatext->getIdeaImage()}}" alt="Logo">
            </div>
            <h2> {{$homeLandingIdeatext->Idea_title}} </h2>
            <p> {{$homeLandingIdeatext->Idea_desc}} </p>
        </div>

        <div class="Form-Container">
            @include('Potato.Forms.LandingSendMessage')
        </div>

    </div>

    <div class="GoalsInfo-Container">

        <div class="Goals-Scenes">
            @include('Potato.Layout.goals-slider')
        </div>

        <div class="Goals-Text">
            <div class="goal-img-con">
                <img src="{{ asset('assets/res/goals.png') }}" alt="Goal" id="Goal-IMG" class="animate">
            </div>
            <h2> My Development Journey & Goals </h2>
            <p> To master Frameworks, building a strong foundation in coding </p>
            <p> I strive to be a creative developer and an effective
                problem solver every day </p>
            <p> To give <span id="client"> clients </span> a satisfaction with my results and work </p>
        </div>

    </div>



    <div class="void">


    </div>






    <div class="Footer" id="Footer">

        @include('Potato.Layout.footer')

    </div>







    @include('Potato.Layout.scriptlinks')
</body>


</html>
