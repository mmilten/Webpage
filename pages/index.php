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
    <?php include('profile.php'); ?>

    <!-- Display Search Results or No Results Message in the middle -->
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
</body>

</html>