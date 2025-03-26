@include('Potato.Layout.headInfo')
<link rel="stylesheet" href="{{ asset('assets/CSS/CSS_Pages/banned.css') }}">



@if ($user)
    @if ($user->is_banned)
        <div class="banned_container">

            <div class="banned_info">

                <div class="img_con">
                    <img src="{{ asset('assets/res/suspension/block.png') }}" alt="banned">
                </div>
                <div class="ban_info_con">
                    <h2>Account Suspended</h2>
                    <p>Your account, <strong>{{ $user->name }}</strong>, has been suspended due to a violation of
                        polocies.</p>
                </div>
                <div class="ban_details">
                    <h3>Reason</h3>
                    <p> {{ $user->offense->reason }} </p>
                    <p> Suspended since: {{ $user->offense->created_at->format('F j, Y') }} </p>
                </div>
            </div>

        </div>
    @else
        @include('errors.404')
    @endif
@else
    @include('errors.404')
@endif
