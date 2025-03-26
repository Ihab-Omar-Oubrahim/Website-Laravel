<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/About_Me.css') }}">
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


    <hr>

    <div class="About_Me_Comment_Section">
        <!-- Main Comment Form and Show Comments -->
        <div class="About_Me_Comment_Section">
            @include('Potato.Pages.AJAX_Items.comment-list')
            <div id="loadingSpinner" style="display: none;">Loading...</div>
        </div>
        <!-- Main Comment Form and Show Comments -->
    </div>
</div>

<div class="Footer" id="Footer">

    @include('Potato.Layout.footer')

</div>


@include('Potato.Layout.scriptlinks')


<script>
    // Reply button //
    document.addEventListener('DOMContentLoaded', function() {
        const replyButtons = document.querySelectorAll('.reply_button');

        replyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const replySection = this.closest('.User_Comment').querySelector(
                    '.Reply_Comment_Section');
                const arrowIcon = this.querySelector('i');

                replySection.classList.toggle('active');

                arrowIcon.classList.toggle('rotate');
            });
        });
    });
    // Toggle Replies Arrow //
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggle_replies');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get the associated Replied_Comments_Section
                const repliesSection = this.closest('.user_info').querySelector(
                    '.Replied_Comments_Section');
                const chevron = this.querySelector('i');

                if (repliesSection) {
                    // Toggle visibility
                    repliesSection.classList.toggle('active');

                    // Rotate the chevron
                    if (chevron) {
                        chevron.classList.toggle('rotate');
                    }
                }
            });
        });
    });
</script>

<script src="{{ asset('assets/JS/Ajax/About_Me_Script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle replies
        document.querySelectorAll('.toggle_replies').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.dataset.commentId;
                const repliesSection = document.querySelector(
                    `.Replied_Comments_Section[data-comment-id="${commentId}"]`);
                if (repliesSection) {
                    repliesSection.classList.toggle('hidden');
                    this.querySelector('i').classList.toggle('fa-chevron-down');
                    this.querySelector('i').classList.toggle('fa-chevron-up');
                }
            });
        });

        // Edit comment
        document.querySelectorAll('.edit_comment').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.dataset.commentId;
                // Add edit logic here
                alert(`Edit comment ID: ${commentId}`);
            });
        });

        // Delete comment
        document.querySelectorAll('.delete_comment').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.dataset.commentId;
                // Add delete logic here
                alert(`Delete comment ID: ${commentId}`);
            });
        });
    });
</script>


