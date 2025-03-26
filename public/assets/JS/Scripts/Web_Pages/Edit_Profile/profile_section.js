function Profile() {
    const profilePic = document.getElementById('profile-pic');
    const username = profilePic.getAttribute('data-username');
    window.location.href = `/${username}/Profile`;
}
