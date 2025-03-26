<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/footer_dashboard.css') }}">
@include('Potato.Layout.headInfo')
@include('Potato.Tools.SuccessMessage')

@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        <div class="main-content">
            @include('admin.dashboard_content')
        </div>

    </div>
@endauth
@guest
    @include('errors.404')
@endguest



<script>
    window.addEventListener('resize', function() {
        const dashboardImg = document.querySelector('.Dashboard_img img'); // Select the img inside the div
        if (window.innerWidth <= 843) {
            dashboardImg.style.width = '100px'; // Hide the image
        } else {
            dashboardImg.style.width = '256px'; // Show the image
        }
    });

    // Trigger the function once on load to handle initial display
    (function() {
        const dashboardImg = document.querySelector('.Dashboard_img img');
        if (window.innerWidth <= 843) {
            dashboardImg.style.width = '100px';
        }
    })();
</script>
