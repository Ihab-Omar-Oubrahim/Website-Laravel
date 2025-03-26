<!-- comment-item.blade.php -->
<div class="User_Comment">
    <div class="user_img_con">
        <img src="{{ $comment->user->getImageURL() }}" alt="User_IMG" id="user_img">
    </div>
    <div class="user_info">
        <div class="comment_date_time">
            <i class="fa fa-clock"></i>
            <span>{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <h2 id="user">{{ $comment->user->name }}</h2>
        <p id="comment">{{ $comment->main_comment }}</p>

        <div class="comment_actions">
            <button type="button" class="action_button toggle_replies">
                <i class="fa fa-chevron-down"></i> <!-- Arrow down by default -->
            </button>
            <button class="reply_button">Reply</button>
            <button class="action_button">Report</button>

            @if (Auth::check() && Auth::id() === (string) $comment->user_id)
                <button class="action_button">Edit</button>
                <button class="action_button">Delete</button>
            @endif
        </div>

        <!-- Reply Section -->

        <!-- Replied Comments Section -->
    </div>
</div>
