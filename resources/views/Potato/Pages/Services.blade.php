@include('Potato.Layout.headInfo')
@include('Potato.Layout.header')
@include('Potato.Tools.SuccessMessage')
<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/Services.css') }}">

<div class="Services_Con">

    <div class="services">
        <div class="service" id="S1">
            <div class="service_image_con">
                <img src="{{ asset('assets/res/Services/Websites.png') }}" alt="Service Icon">
            </div>
            <div class="title_con">
                <h3>Creating Websites</h3>
            </div>
            <p>
                Creating websites to your needs,
                whether it's a portfolio, a shopping platform,
                or additional pages depending on your requirements.
            </p>
            <div class="Bottom">
                <div class="More_con">
                    <a href="#">More</a>
                </div>
            </div>

        </div>
        <div class="service" id="S2">
            <div class="service_image_con">
                <img src="{{ asset('assets/res/Services/Applications.png') }}" alt="Service Icon">
            </div>
            <div class="title_con">
                <h3>Making Applications</h3>
            </div>
            <p>
                Developing applications, such as management tools,
                to help streamline workflows and make your work more efficient.
            </p>
            <div class="Bottom">
                <div class="More_con">
                    <a href="#">More</a>
                </div>
            </div>
        </div>
        <div class="service" id="S3">
            <div class="service_image_con">
                <img src="{{ asset('assets/res/Services/Database.png') }}" alt="Service Icon">
            </div>
            <div class="title_con">
                <h3>Databases Changes</h3>
            </div>
            <p>
                If you need any changes or additions to your database, I can ensure seamless updates and efficient
                implementation.
            </p>
            <div class="Bottom">
                <div class="More_con">
                    <a href="#">More</a>
                </div>
            </div>

        </div>
    </div>


</div>


<div class="Footer" id="Footer">
    @include('Potato.Layout.footer')
</div>

@include('Potato.Layout.scriptlinks')
