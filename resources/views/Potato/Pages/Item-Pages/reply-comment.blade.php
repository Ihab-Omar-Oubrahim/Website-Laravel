@auth
    <div class="Reply_Comment_Section">
        <form action="{{ Auth::check() ? route('reply_comment.store', ['user_id' => Auth::id()]) : '#' }}" method="POST"
            class="form-prevent-multiple-submit">
            @csrf
            <input type="hidden" name="comment_id" value="{{ $UserComment->id }}">
            <div class="User_Comment reply_comment">
                <div class="user_img_con">
                    <img src="{{ Auth::user()->getImageURL() }}" alt="User_IMG" id="user_img">
                </div>
                <div class="user_info">
                    <textarea name="reply_comment" placeholder="Write a reply..." class="reply_comment_input"></textarea>
                    <button type="submit" class="submit_reply_comment prevent-multiple-submits" data-action="reply">
                        Submit Reply
                        <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..." style="width: 25px; margin-left: 5px; display: none;" class="loading-image"/>
                    </button>
                    <br>
                    @error('reply_comment')
                        <span style="color: red;margin-top: 25px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
@endauth
@guest
    <div class="Reply_Comment_Section">
        <div class="User_Comment reply_comment" style="padding: 20px;">
            <p style="font-size: 24px; text-align:center;">You must be logged in to comment</p>
            <div class="guest_login_container" style="display: flex; align-items: center; justify-content: center;">
                <a href="{{ route('login') }}">
                    <button id="Guest_Login_Button" style="display: block;">Login</button>
                </a>
            </div>
        </div>
    </div>
@endguest
