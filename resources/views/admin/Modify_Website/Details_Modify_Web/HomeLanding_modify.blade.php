@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/modify_web.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/modify_page.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/modify_buttons_options.css') }}">

<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/home_landing/section2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/home_landing/section3.css') }}">

@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ asset('assets/res/Admin_Res/sidebar_res/website.png') }}" alt="edit_website_logo"
                                class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title"> Home_Landing Management </h1>
                            <p class="header_description">editing home_landing page</p>
                        </div>
                    </div>
                </div>

                <div class="Website_Pages_Selections">
                    <button class="section-tab active" data-section="section1">Section 1</button>
                    <button class="section-tab" data-section="section2">Section 2</button>
                    <button class="section-tab" data-section="section3">Section 3</button>
                    <button class="section-tab" data-section="section4">Section 4</button>
                    <button class="section-tab" data-section="section5">Section 5</button>
                </div>

                <div id="section1" class="section-form active">
                    @include('admin.Modify_Website.Details_Modify_Web.Modify_Pages.dashboard_home_landing_s1_intro')
                </div>

                <div id="section2" class="section-form">
                    @include('admin.Modify_Website.Details_Modify_Web.Modify_Pages.dashboard_home_landing_s2_info')
                </div>

                <div id="section3" class="section-form">
                    @include('admin.Modify_Website.Details_Modify_Web.Modify_Pages.dashboard_home_landing_s3_idea')
                </div>

                <div id="section4" class="section-form">
                    @include('admin.Modify_Website.Details_Modify_Web.Modify_Pages.dashboard_home_landing_s4_items_info')
                </div>

                <div id="section5" class="section-form">
                    @include('admin.Modify_Website.Details_Modify_Web.Modify_Pages.dashboard_home_landing_s5_items_slider')
                </div>




                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>

    {{-- Script for Section 1 --}}


    <script>
        document.querySelectorAll('.img-con img').forEach((img, index) => {
            const fileInput = document.getElementById(`file-input-${index + 1}`);

            img.addEventListener('click', () => {
                fileInput.click();
            });

            fileInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        img.src = e.target.result;
                        // Optionally, update the image path in the database via an AJAX call
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.section-tab').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.section-tab').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.section-form').forEach(section => section.classList.remove(
                    'active'));
                button.classList.add('active');
                const sectionId = button.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    </script>

    <script>
        document.querySelectorAll('.section-tab').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.section-tab').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.section-form').forEach(form => form.classList.remove('active'));

                button.classList.add('active');
                const sectionId = button.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    </script>


    {{-- Script for Section 2 --}}

    <script>
        function previewImage(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = e => preview.src = e.target.result;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }

        previewImage('image_left', 'preview_left');
        previewImage('image_middle', 'preview_middle');
        previewImage('image_right', 'preview_right');
    </script>

    {{-- Script for Section 3 --}}


    <script>
        const preview = document.getElementById('idea_img_preview');
        const input = document.getElementById('idea_img_input');

        preview.addEventListener('click', () => input.click());

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    preview.src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>


@endauth
@guest
    @include('errors.404')
@endguest
