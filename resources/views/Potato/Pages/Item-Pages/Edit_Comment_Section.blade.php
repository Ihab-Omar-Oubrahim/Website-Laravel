<!-- Hidden Edit Section -->
<form id="edit-section-{{ $UserComment->id }}" class="User_Edit_Comment_Section" style="display: none;" method="POST"
    action="{{ route('user_update_comment', $UserComment->id) }}">
    @csrf
    <textarea id="edit-input-{{ $UserComment->id }}" class="edit_comment_input" name="edited_comment">{{ $UserComment->main_comment }}</textarea>

    <div class="comment_actions">
        <button type="button" class="action_button toggle_replies">
            <i class="fa fa-chevron-down"></i> <!-- Arrow down by default -->
        </button>

        <button type="submit" class="action_button save_button" style="color: rgb(202, 173, 8);">Save</button>

        <button type="button" class="action_button edit_button"
            onclick="cancelEdit({{ $UserComment->id }})">Back</button>

        <button class="reply_button">Reply</button>

        <button type="button" class="action_button report_button"
            onclick="toggleReportForm({{ $UserComment->id }})">Report</button>

        @if (Auth::check() && Auth::id() === (string) $UserComment->user_id)
            <button type="button" class="action_button delete_button"
                onclick="toggleDeleteForm({{ $UserComment->id }})">Delete</button>
        @endif
    </div>
</form>
