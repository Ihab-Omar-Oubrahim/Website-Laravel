@auth
    <form id="commentForm" action="{{ Auth::check() ? route('comment.store', ['user_id' => Auth::id()]) : '#' }}"
        method="POST">
        @csrf
        <div class="User_Comment">
            <div class="user_img_con">
                <img src="{{ Auth::check() ? Auth::user()->getImageURL() : asset('assets/res/default_user.png') }}"
                    alt="User_IMG" id="user_img">
            </div>
            <div class="user_info">
                <h2 id="user">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h2>
                <textarea name="comment" placeholder="Write a main comment..." class="main_comment_input" required></textarea>
                <button type="submit" class="submit_main_comment">Submit Comment</button>
            </div>
        </div>
    </form>

@endauth
@guest
    <div class="User_Comment" style="padding: 25px;">
        <p style="font-size: 24px; text-align:center;">You must be logged in to comment</p>
    </div>
@endguest

@forelse($UserComments as $UserComment)
    <div class="User_Comment">
        <div class="user_img_con">
            <img src="{{ $UserComment->user->getImageURL() }}" alt="User_IMG" id="user_img">
        </div>
        <div class="user_info">
            <div class="comment_date_time">
                <i class="fa fa-clock"></i>
                <span>{{ $UserComment->created_at->diffForHumans() }}</span>
            </div>
            <h2 id="user">{{ $UserComment->user->name }}</h2>
            <p id="comment">{{ $UserComment->main_comment }}</p>
        </div>

        <!-- Chevron for displaying replies -->
        <div class="comment_actions">
            <button class="toggle_replies" data-comment-id="{{ $UserComment->id }}">
                <i class="fa fa-chevron-down"></i> Show Replies
            </button>
            <button class="edit_comment" data-comment-id="{{ $UserComment->id }}">Edit</button>
            <button class="delete_comment" data-comment-id="{{ $UserComment->id }}">Delete</button>
        </div>

        <!-- Include Replied Comments -->
        @include('Potato.Pages.Item-Pages.replied-comments', ['UserComment' => $UserComment])

        <!-- Include Reply Form -->
        @include('Potato.Pages.Item-Pages.reply-comment', ['UserComment' => $UserComment])
    </div>
@empty
    <div class="User_Comment">
        <p>There are no comments yet.</p>
    </div>
@endforelse


<!-- Pagination Links -->
{{ $UserComments->links() }}
<!-- Pagination Links -->
