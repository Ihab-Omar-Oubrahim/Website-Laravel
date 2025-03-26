@if (session('success'))
    <div class="container">
        <div class="alert alert-success" id="custom-success-alert">
            <button type="button" class="close" aria-label="Close"
                onclick="document.getElementById('custom-success-alert').style.display='none'">
                <i class="fa fa-times"></i> </button>
            <span id="alert-msg"> {{ session('success') }} </span>
        </div>
    </div>
@endif
<script src="{{ asset('assets/JS/Scripts/tool-script.js') }}"></script>
