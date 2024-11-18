<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
$(document).ready(function() {
    // Handle Sidebar Menu Click
    $('.nav-item.nav-link').on('click', function(e) {
        e.preventDefault(); // Prevent default action (navigation)

        var url = $(this).data('url'); // Get the URL from data-url attribute

        // Make an AJAX request to load content
        $.ajax({
            url: url, // URL to load
            method: 'GET',
            success: function(response) {
                // Replace the content of #content-container with the new content
                $('#content-container').html(response);
            },
            error: function() {
                // Handle errors (optional)
                alert("Error loading the page. Please try again.");
            }
        });
    });
});
