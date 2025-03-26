function toggleProfile(event) {
    event.preventDefault();
    const modal = document.getElementById("profileModal");
    const content = modal.querySelector(".profile-content");

    if (modal.classList.contains("show")) {
        modal.classList.remove("show");
        content.classList.remove("show");
        setTimeout(() => {
            modal.style.display = "none";
        }, 300);
    } else {
        modal.style.display = "flex";
        setTimeout(() => {
            modal.classList.add("show");
            content.classList.add("show");
        }, 10);
    }
}
document.getElementById('profile-pic').setAttribute('draggable', false);
document.getElementById('profile-pic').addEventListener('contextmenu', function (e) {
    e.preventDefault(); // Disable the right-click menu
});

let isEditingProfile = false;

function ToggleEditSection(event) {
    event.preventDefault();
    const profileCon = document.getElementById('profile-con');
    const editProfileCon = document.getElementById('edit-profile-con');
    const SolutionTemp = document.getElementById('Edit-P-Sol');
    isEditingProfile = !isEditingProfile;

    if (isEditingProfile) {
        // Show edit form, hide profile content
        profileCon.style.display = "none";
        editProfileCon.style.display = "block";
        SolutionTemp.style.display = "block";
    } else {
        // Show profile content, hide edit form
        profileCon.style.display = "block";
        editProfileCon.style.display = "none";
        SolutionTemp.style.display = "none";
    }
}
