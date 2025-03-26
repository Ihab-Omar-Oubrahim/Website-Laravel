<div class="Replied_Comments_Section">
    <!-- Example replied comment -->
    @foreach ($UserComment->replies as $Reply)
        <div class="Replied_Comment">
            <div class="user_img_con">
                <img src="{{ $Reply->user->getImageURL() }}" alt="User_IMG" class="reply_user_img">
            </div>
            <div class="user_info">
                <h3 class="reply_user_name">{{ $Reply->user->name }}
                    @if ($Reply->user->user_id === auth()->id())
                        <span style="color: rgb(241, 241, 140); font-size:10px;">(You)</span>
                    @endif
                </h3>
                <p class="reply_text">{{ $Reply->message }}</p>
                <div class="reply_date_time">
                    <i class="fa fa-clock"></i>
                    <span>{{ $Reply->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Empty message if no replies -->
    @if ($UserComment->replies->isEmpty())
        <p class="no_replies">No replies yet.</p>
    @endif
</div>
