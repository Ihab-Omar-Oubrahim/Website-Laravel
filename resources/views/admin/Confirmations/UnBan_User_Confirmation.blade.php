<form method="POST" action="{{ route('unban_selected_user', ['user_id' => $user->user_id]) }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->user_id }}">

    <button class="dashboard-btn ban-btn" type="submit">
        <i class="fas fa-gavel"></i> UnBan User
    </button>
</form>
