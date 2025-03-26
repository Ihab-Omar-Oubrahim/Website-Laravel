 // Automatically hide the alert after 5 seconds
 setTimeout(function() {
    var alert = document.getElementById('custom-success-alert');
    alert.classList.add('slide-out');
    setTimeout(function() {
        alert.style.display = 'none';
    }, 350); // Match the slide-out animation duration
}, 5000); // 5 seconds delay

// Instantly close the alert when 'X' is clicked
function closeAlert() {
    var alert = document.getElementById('custom-success-alert');
    alert.style.display = 'none';
}
