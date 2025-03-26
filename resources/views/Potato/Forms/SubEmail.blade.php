@auth

    @if (Auth::user()->following)
        <h2 id="F3-Title"> You are following ! </h2>
    @else
        <h2 id="F3-Title"> Follow for more updates ! </h2>
    @endif
    @if (Auth::user()->following)
        <form action="{{ route('user.unfollowing') }}" method="POST" class="F3-Form" id="F3-Form">
            @csrf
            @method('DELETE')
            <input type="email" name="following_email_true" id="sub-email" value="{{ Auth::user()->email }}" readonly>
            <button type="submit" id="sub-form"> Unfollow </button>
            <div class="Sub-img-con">
                <img src="{{ asset('assets/res/unfollow.png') }}" alt="Subscribe">
            </div>
        </form>
    @else
        <form action="{{ route('user.following') }}" method="POST" class="F3-Form" id="F3-Form">
            @csrf
            <input type="email" name="followed_email" id="sub-email" placeholder="Enter email address" value="{{ Auth::user()->email }}" readonly required>
            <button type="submit" id="sub-form"> Follow </button>
            <div class="Sub-img-con">
                <img src="{{ asset('assets/res/follow.png') }}" alt="Subscribe">
            </div>
        </form>
    @endif

@endauth

@guest
    <h2 id="F3-Title"> You need to login to follow </h2>
    <div class="login_footing_msg_guest">
        <a href="{{ route('login') }}">
            <button id="Guest_Login_Button">Login</button>
        </a>
    </div>
@endguest
