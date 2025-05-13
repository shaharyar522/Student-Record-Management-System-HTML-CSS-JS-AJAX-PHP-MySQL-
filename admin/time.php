
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP jQuery AJAX Clock</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function() {
            function updateClock() {
                $.ajax({
                    url: 'get_time.php', // PHP script to fetch time
                    success: function(response) {
                        $('#clock').text(response); // Update the clock
                    }
                });
            }
            //hello 

            // Update the clock every second
            setInterval(updateClock, 1000);

            // Initial call to display the clock immediately    
            updateClock();
        });
    </script>
</body>
</html>

<?php
echo date("h:i:s A"); // Returns the current time in 12-hour format with AM/PM
?>