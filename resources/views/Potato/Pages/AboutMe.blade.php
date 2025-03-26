<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/About_Me.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Comments/Comment_Section.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Comments/Report_Comment.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Guest/guest.css') }}">
@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')

<div class="about_me_con">

    <div class="Items-con">

        <div class="My_PFP">
            <div class="ab_ic">
                <img src="{{ asset('assets/res/About_Me_PFP.png') }}" id="AboutMe_pfp">
            </div>
        </div>

        <div class="My_INFO">

            <div class="Intro">

                <h2> Hello There! I'm <span id="MyUser">-</span> </h2>
                <h3> Gamer & Developper </h3>
                <p> I'm a person whose focused and studies Developpement and web design,
                    and also a person who loves video games, I like coding & designing webs
                    and gaining more knowledge as I'm working on webs.
                </p> <br>
                <p> C Language was the first languages that I've practiced followed by Java as second,
                    and I've started my Web coding and design adventures after my previous two languages,
                    over all, I have a year of experience with Java and almost two years of experience with
                    Websites, thought I just started my PhP adventure around 3 months ago.
                </p>
                <div class="personal_info">

                    <h2> Information</h2>

                    <ul>
                        <li><span>Birthday:</span> December 7</li>
                        <li><span>Location:</span> Morocco</li>
                        <li><span>Email:</span> your-email@example.com</li>
                        <!-- <li><span>Phone:</span> No Phone atm </li> -->
                        <li><span>Languages:</span> English, French, Arabic</li>
                        <li><span>Available for Freelance:</span> Yes</li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

    <div class="Specified_Info_Con">
        <div class="Speak_language">
            <h2>Languages I Speak</h2>
            <div class="language">
                <div class="language-info">
                    <img src="{{ asset('assets/res/flags/morocco.png') }}" alt="Arabic Flag" class="flag">
                    <label>Arabic (Main Language)</label>
                </div>
                <div class="progress-bar">
                    <div class="progress" style="width: 100%;"></div>
                </div>
                <span>100%</span>
            </div>
            <div class="language">
                <div class="language-info">
                    <img src="{{ asset('assets/res/flags/usa.png') }}" alt="English Flag" class="flag">
                    <label>English (Second Language)</label>
                </div>
                <div class="progress-bar">
                    <div class="progress" style="width: 79%;"></div>
                </div>
                <span>79%</span>
            </div>
            <div class="language">
                <div class="language-info">
                    <img src="{{ asset('assets/res/flags/france.png') }}" alt="French Flag" class="flag">
                    <label>French (Third Language)</label>
                </div>
                <div class="progress-bar">
                    <div class="progress" style="width: 40%;"></div>
                </div>
                <span>40%</span>
            </div>
        </div>


        <div class="Languages_Info">
            <h2>My Language Journey</h2>
            <p>
                Born in <span>Rabat</span>, <span>Morocco</span>, my linguistic journey began with <span>Arabic</span>,
                my native language.
                As a child, I started learning <span>French</span>, but over time, my exposure to it diminished as I
                attended an
                Arabic-speaking school.
            </p>
            <p>
                My passion for <span>English</span> grew through playing video games, watching movies and enjoying
                series.
                This exposure helped me develop my <span>English</span> skills, and today, I feel more comfortable
                expressing myself
                in <span>English</span> than in <span>Arabic</span> or <span>French</span>, especially in the field of
                development.
            </p>
            <p>
                While I'm not perfect in <span>English</span>, I continuously strive to improve every day, embracing the
                challenge as
                part of my passion for learning and communication.
            </p>
        </div>

    </div>

    <div class="Schools">
        <div class="Studies_Con">
            <h2>My Educational Journey</h2>
            <p>
                I began my studies at <span class="highlight">AL AMANA</span>, located in <span class="highlight">HAY
                    SALAM</span>,
                but I switched schools to <span class="highlight">AL SAFWA</span> in my final year, where I successfully
                graduated
                and received my bachelor's degree in the academic year <span class="highlight">2020-2021</span>.
            </p>

            <p>
                Following that, I pursued Computer Science at <span class="highlight">ORDICIEL</span>,
                located in <span class="highlight">Rabat, Hassan</span>. My field of study was
                <span class="important">Specialized Technician in Software Development</span>,
                and I earned my diploma in the year <span class="highlight">2021-2023</span>.
            </p>
            <p>
                I continued my academic journey at <span class="highlight">ORDICIEL</span> to pursue
                a <span class="important">Bachelor Professionnel</span> (<u>Professional Bachelor's Degree</u>).
                In collaboration with <span class="highlight" id="IFPS">IFPS - International Foundation of
                    Professional Studies</span>,
                based in France, I graduated with a
                <span class="important">Professional Bachelor's Degree in Application Design and Development
                    Engineering</span>
                in the academic year <span class="highlight">2023-2024</span>.
            </p>
        </div>
        <div class="School_List">
            <!-- AL AMANA -->
            <div class="school">
                <a href="{{ route('Al_Safwa') }}">
                    <img src="{{ asset('assets/res/Schools/SAFWA.jpg') }}" alt="AL AMANA Logo" class="school-logo">
                </a>

                <a href="{{ route('Al_Safwa') }}">
                    <h3>AL SAFWA</h3>
                </a>
                <p>Location: HAY SALAM</p>
                <p>Degree: Bachelor's Degree (2020-2021)</p>
            </div>
            <hr>
            <!-- ORDICIEL (Technician) -->
            <div class="school">
                <a href="{{ route('Ordiciel') }}">
                    <img src="{{ asset('assets/res/Schools/Ordiciel.jpg') }}" alt="ORDICIEL Logo" class="school-logo">
                </a>

                <a href="{{ route('Ordiciel') }}">
                    <h3>ORDICIEL</h3>
                </a>
                <p>Location: Rabat, Hassan</p>
                <p>Field: Specialized Technician in Software Development (2021-2023)</p>
                <p>Degree: Diploma</p>
            </div>
            <hr>
            <!-- ORDICIEL + IFPS -->
            <div class="school">
                <a href="{{ route('IFPS') }}">
                    <img src="{{ asset('assets/res/Schools/IFPS.png') }}" alt="IFPS Logo" class="school-logo">
                </a>
                <a href="{{ route('IFPS') }}">
                    <h3>ORDICIEL / IFPS</h3>
                </a>
                <p>Location: France (Collaboration with ORDICIEL)</p>
                <p>Field: Professional Bachelor's Degree in Application Design and Development Engineering (2023-2024)
                </p>
                <p>Degree: Bachelor Professionnel</p>
            </div>
        </div>

    </div>




    <hr>

    @include('Potato.Pages.Item-Pages.Comment_Section')


</div>

<div class="Footer" id="Footer">
    @include('Potato.Layout.footer')
</div>


@include('Potato.Layout.scriptlinks')
<script src="{{ asset('assets/JS/Scripts/About_Me.js') }}"></script>
