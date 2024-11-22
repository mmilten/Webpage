<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/profile.css" type="text/css">
    <?php require('../templates/common/header-head.php'); ?>
</head>

<body>
    <?php include('header.php'); ?>
    <!-- Display profile.php only when "view=profile" is in the URL -->
    <div class="content">
        <?php
        // Check if the 'view' parameter is set to 'profile'
        if (isset($_GET['view']) && $_GET['view'] === 'profile') {
            include('profile.php'); // Include profile.php
        }
        ?>

        <!-- Display Search Results or No Results Message -->
        <div class="search-results">
            <?php
            if (isset($_POST["submit"]) && !empty($_POST["search"])) {
                include('search.php');
                // Display the no results message if it's set
                if (!empty($noResultsMessage)) {
                    echo $noResultsMessage;
                }
            }
            ?>
        </div>

        <script>
            document.getElementById('profile-link').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                const urlParams = new URLSearchParams(window.location.search);

                // Check if 'view' parameter is present and set to 'profile'
                if (urlParams.get('view') === 'profile') {
                    // If it is, remove it
                    urlParams.delete('view');
                } else {
                    // If it isn't, add it
                    urlParams.set('view', 'profile');
                }

                // Update the URL without reloading the page
                window.history.replaceState({}, '', `${window.location.pathname}?${urlParams}`);

                // Optionally, you could refresh the page to see the effect
                location.reload(); // Refresh the page to display profile.php
            });
        </script>
</body>

</html>