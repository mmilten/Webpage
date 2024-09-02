<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/profile.css" type="text/css">
    <?php require('../templates/common/header-head.php'); ?>
    <?php require('session.php'); ?>
    <style>
        table,
        th,
        td {
            border: 1px solid purple;
        }

        table {
            table-layout: auto;
            align-items: center;
            justify-content: center;
            width: 50%;
            border-collapse: collapse;
            padding: 30px;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <?php include('profile.php'); ?>

</body>

</html>