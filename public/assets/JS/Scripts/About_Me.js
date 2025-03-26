// Reply button //
document.addEventListener('DOMContentLoaded', function () {
    const replyButtons = document.querySelectorAll('.reply_button');

    replyButtons.forEach(button => {
        button.addEventListener('click', function () {
            const replySection = this.closest('.User_Comment').querySelector(
                '.Reply_Comment_Section');
            const arrowIcon = this.querySelector('i');

            replySection.classList.toggle('active');

            arrowIcon.classList.toggle('rotate');
        });
    });
});
// Toggle Replies Arrow //
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle_replies');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the associated Replied_Comments_Section
            const repliesSection = this.closest('.user_info').querySelector(
                '.Replied_Comments_Section');
            const chevron = this.querySelector('i');

            if (repliesSection) {
                // Toggle visibility
                repliesSection.classList.toggle('active');

                // Rotate the chevron
                if (chevron) {
                    chevron.classList.toggle('rotate');
                }
            }
        });
    });
});




// Function to toggle visibility of the report form
function toggleReportForm(commentId) {
    var reportFormContainer = document.getElementById('report-form-container-' + commentId);

    if (reportFormContainer.style.display === 'none') {
        reportFormContainer.style.display = 'flex';
        reportFormContainer.style.animation = 'fadeIn 0.5s ease-out';
    } else {
        reportFormContainer.style.animation = 'fadeOut 0.5s ease-out';
        setTimeout(function () {
            reportFormContainer.style.display = 'none';
            reportFormContainer.style.animation = '';
        }, 500);
    }
}

function FormBack(commentId) {
    var reportFormContainer = document.getElementById('report-form-container-' + commentId);

    if (reportFormContainer.style.display === 'flex') {
        reportFormContainer.style.animation = 'fadeOut 0.5s ease-out';
        setTimeout(function () {
            reportFormContainer.style.display = 'none';
            reportFormContainer.style.animation = '';
        }, 320);
    }
}


// Function to toggle visibility of the delete form
function toggleDeleteForm(commentId) {
    var deleteFormContainer = document.getElementById('delete-form-container-' + commentId);

    if (deleteFormContainer.style.display === 'none') {
        deleteFormContainer.style.display = 'flex';
        deleteFormContainer.style.animation = 'fadeIn 0.5s ease-out';
    } else {
        deleteFormContainer.style.animation = 'fadeOut 0.5s ease-out';
        setTimeout(function () {
            deleteFormContainer.style.display = 'none';
            deleteFormContainer.style.animation = '';
        }, 500);
    }
}

// Function to close the delete form
function FormBackDelete(commentId) {
    var deleteFormContainer = document.getElementById('delete-form-container-' + commentId);

    if (deleteFormContainer.style.display === 'flex') {
        deleteFormContainer.style.animation = 'fadeOut 0.5s ease-out';
        setTimeout(function () {
            deleteFormContainer.style.display = 'none';
            deleteFormContainer.style.animation = '';
        }, 320);
    }
}







