@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Modify_Web_CSS/modify_web.css') }}">


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
                            <h1 class="header_title"> Website Management </h1>
                            <p class="header_description">modify your website's info</p>
                        </div>
                    </div>
                </div>

                <div class="Website_Modification_Container">

                    @forelse ($pages as $page)
                        <a href="{{ route('modify_home_landing', ['id_page' => $page->id_page]) }}"
                            class="website_page_link">
                            <div class="website_page_container">
                                <p id="page_name">{{ $page->page_name }}</p>
                                <div class="website_icon_con">
                                    <img src="{{ $page->getIcon() }}" alt="page icon" draggable="false">
                                </div>
                                <p id="page_id">{{ $page->id_page }}</p>
                            </div>
                        </a>
                    @empty
                        <p>No pages found</p>
                    @endforelse


                </div>




                @include('admin.Elements.dashboard_footer')

            </div>
        </div>
    </div>



@endauth
@guest
    @include('errors.404')
@endguest
