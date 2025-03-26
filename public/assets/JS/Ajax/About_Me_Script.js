/* For pagination */

document.addEventListener('DOMContentLoaded', () => {
    // Handle pagination link clicks
    document.querySelector('.About_Me_Comment_Section').addEventListener('click', function (event) {
        const target = event.target;

        // Check if the clicked element is a pagination link
        if (target.tagName === 'A' && target.closest('.pagination')) {
            event.preventDefault();

            const url = target.getAttribute('href'); // Get the link URL

            // Make AJAX request to fetch paginated comments
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Required for Laravel to detect AJAX
                },
            })
                .then(response => response.text())
                .then(html => {
                    // Replace the comment section with the new content
                    document.querySelector('.About_Me_Comment_Section').innerHTML = html;
                })
                .catch(error => console.error('Error fetching paginated comments:', error));
        }
    });
});



// Loading Spinner //
fetch(url, {
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
})
    .then(response => response.text())
    .then(html => {
        if (html.includes('View [Potato.Pages.AJAX_Items.comment-list] not found')) {
            console.error('View not found error:', html);
        } else {
            document.querySelector('.About_Me_Comment_Section').innerHTML = html;
        }
    })
    .catch(error => console.error('AJAX Error:', error));




    document.addEventListener('DOMContentLoaded', function () {
        function rebindCommentActions() {
            // Rebind toggle, edit, delete logic here
        }

        // AJAX pagination
        document.addEventListener('click', function (event) {
            if (event.target.matches('.pagination a')) {
                event.preventDefault();
                const url = event.target.href;

                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('.About_Me_Comment_Section').innerHTML = html;
                        rebindCommentActions(); // Rebind logic after replacing content
                    });
            }
        });
    });


