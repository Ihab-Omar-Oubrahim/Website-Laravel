<link rel="stylesheet" href="{{ asset('assets/CSS/Comments/Report_Comment.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Comments/Delete_Comment.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Comments/Edit_Comment.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="About_Me_Comment_Section">
    <!-- Main Comment Form -->
    @auth
        <form id="commentForm" action="{{ Auth::check() ? route('comment.store', ['user_id' => Auth::id()]) : '#' }}"
            method="POST" class="form-prevent-multiple-submit">
            @csrf
            <div class="User_Comment">
                <div class="user_img_con">
                    <img src="{{ Auth::check() ? Auth::user()->getImageURL() : asset('assets/res/default_user.png') }}"
                        alt="User_IMG" id="user_img">
                </div>
                <div class="user_info">
                    <h2 id="user">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</h2>
                    <textarea name="comment" placeholder="Write a main comment..." class="main_comment_input"></textarea>
                    <button type="submit" class="submit_main_comment prevent-multiple-submits" id="submit_main_comment"
                        data-action="submit_main_comment">
                        Submit Comment
                        <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                            style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
                    </button>
                    <br>
                    @error('comment')
                        <span style="color: red;margin-top: 25px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
    @endauth
    @guest
        <div class="User_Comment" style="padding: 25px;">
            <p style="font-size: 24px; text-align:left;">You must be logged in to comment</p>
            <div class="guest_login_container">
                <a href="{{ route('login') }}">
                    <button id="Guest_Login_Button">Login</button>
                </a>
            </div>
        </div>
    @endguest

    <!-- Main Comment Form -->


    <!-- Show Comments -->
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

                <p id="comment-{{ $UserComment->id }}" class="comment_message">{{ $UserComment->main_comment }}</p>




                @include('Potato.Pages.Item-Pages.Edit_Comment_Section')





                <div class="comment_actions" id="comment-actions-{{ $UserComment->id }}">
                    <button type="button" class="action_button toggle_replies">
                        <i class="fa fa-chevron-down"></i> <!-- Arrow down by default -->
                    </button>
                    <button class="reply_button">Reply</button>
                    <button type="button" class="action_button report_button"
                        onclick="toggleReportForm({{ $UserComment->id }})">Report</button>

                    @if (Auth::check() && Auth::id() === (string) $UserComment->user_id)
                        <button type="button" class="action_button edit_button"
                            onclick="toggleEditMode({{ $UserComment->id }})">Edit</button>

                        <button type="button" class="action_button delete_button"
                            onclick="toggleDeleteForm({{ $UserComment->id }})">Delete</button>
                    @endif
                </div>
                <!-- Reply Section -->
                @include('Potato.Pages.Item-Pages.reply-comment')
                <!-- Reply Section -->

                <!-- Replied Comments Section -->
                @include('Potato.Pages.Item-Pages.replied-comments')
                <!-- Replied Comments Section -->

                <!-- Report Comments Section (Initially Hidden) -->
                <div class="report-form-container form-prevent-multiple-submit"
                    id="report-form-container-{{ $UserComment->id }}" style="display: none;">
                    <div class="Report_Comment_Form" id="report-form-{{ $UserComment->id }}">
                        <form action="{{ route('report_comment') }}" method="POST">
                            @csrf
                            <div class="report_icon_con">
                                <img src="{{ asset('assets/res/report_user.png') }}" alt="Report_icon" id="Report_IMG">
                            </div>

                            <h3 for="report_title"> Report Comment</h3>

                            <input type="hidden" name="comment_id2" value="{{ $UserComment->id }}">
                            <div class="form-group">
                                <input type="text" placeholder="Report Title" id="report_title" name="report_title"
                                    required>
                            </div>
                            <div class="form-group">
                                <textarea id="report_reason" name="report_reason" placeholder="Why are you reporting this comment?" required></textarea>
                            </div>
                            <div class="report_actions">
                                <button type="submit" id="Report_Sub" class="prevent-multiple-submits"
                                    data-action="report_comment">
                                    Submit Report
                                    <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                        style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
                                </button>
                                <button type="button" id="close_report_form"
                                    onclick="FormBack({{ $UserComment->id }})">Back</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Report Comments Section -->

                <!-- Delete Comment Section (Initially Hidden) -->
                <div class="delete-form-container form-prevent-multiple-submit"
                    id="delete-form-container-{{ $UserComment->id }}" style="display: none;">
                    <div class="Delete_Comment_Form" id="delete-form-{{ $UserComment->id }}">
                        <form action="{{ route('user_delete_comment') }}" method="POST">
                            @csrf
                            <div class="delete_icon_con">
                                <img src="{{ asset('assets/res/delete_comment.png') }}" alt="Delete_icon"
                                    id="Delete_IMG">
                            </div>

                            <h3>Are you sure?</h3>

                            <p> do you really wish to delete this comment ? this action can not be undone. </p>

                            <input type="hidden" name="comment_id" value="{{ $UserComment->id }}">

                            <div class="delete_actions">
                                <button type="submit" id="Delete_Sub" class="prevent-multiple-submits"
                                    data-action="delete_comment">
                                    Confirm Delete
                                    <img src="{{ asset('assets/res/loading.gif') }}" alt="Loading..."
                                        style="width: 25px; margin-left: 5px; display: none;" class="loading-image" />
                                </button>
                                <button type="button" id="close_delete_form"
                                    onclick="FormBackDelete({{ $UserComment->id }})">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Comment Section -->


            </div>

        </div>
    @empty
        <div class="User_Comment">
            <p> There are no comments yet. </p>
        </div>
    @endforelse
</div>



<!-- Pagination Links -->
<div id="paginationContainer">
    {{ $UserComments->links() }}
</div>
<!-- Show Comments -->


<script src="{{ asset('assets/JS/Scripts/Pages/Submit.js') }}"></script>

<script>
    function toggleEditMode(commentId) {
        var commentText = document.getElementById('comment-' + commentId);
        var editSection = document.getElementById('edit-section-' + commentId);
        var mainCommentActions = document.getElementById('comment-actions-' + commentId);
        var editCommentActions = editSection.querySelector('.comment_actions');

        if (!commentText || !editSection || !mainCommentActions || !editCommentActions) {
            console.error("Element not found for commentId:", commentId);
            return;
        }

        if (editSection.style.display === 'none' || editSection.style.display === '') {
            editSection.style.display = 'flex';
            commentText.style.display = 'none';
            mainCommentActions.style.display = 'none';
            editCommentActions.style.display = 'flex';
        } else {
            editSection.style.display = 'none';
            commentText.style.display = 'block';
            mainCommentActions.style.display = 'flex';
            editCommentActions.style.display = 'none';
        }
    }

    function cancelEdit(commentId) {
        var editSection = document.getElementById('edit-section-' + commentId);
        var commentText = document.getElementById('comment-' + commentId);
        var mainCommentActions = document.getElementById('comment-actions-' + commentId);
        var editCommentActions = editSection.querySelector('.comment_actions');

        if (!commentText || !editSection || !mainCommentActions || !editCommentActions) {
            console.error("Element not found for commentId:", commentId);
            return;
        }

        editSection.style.display = 'none';
        commentText.style.display = 'block';
        mainCommentActions.style.display = 'flex';
        editCommentActions.style.display = 'none';
    }
</script>
