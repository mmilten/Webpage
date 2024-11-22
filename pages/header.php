<?php
require_once('../core/config.php');
require_once('../core/controller.Class.php');

function renderNavbar($isLoggedIn, $logoutLink)
{
    echo '
    <header>
        <a href="#" class="logo">LOGO</a>';

    // Search bar
    echo '
        <form class="searchbar" action="index.php" method="POST">
            <input type="text" name="search" placeholder="Search..." required>
            <button type="submit" name="submit">Search</button>
        </form>';

    echo '
        <nav class="navbar">
        ';

    if ($isLoggedIn) {
        echo '
            <div class="dropdown">
                <button class="dropbtn">Menu +</button>
                <div class="dropdown-content">
                    <a href="#" id="profile-link">Profile</a> <!-- Profile link with an ID -->
                    <a href="' . $logoutLink . '">Logout</a>
                </div>
            </div>';
    } else {
        echo '<a href="login.php">Login</a>';
    }
    echo '
        </nav>
    </header>';
}

if (isset($_SESSION["user_id"])) {
    renderNavbar(true, '../core/logout.php');
} elseif (isset($_COOKIE["id"]) && isset($_COOKIE["sess"])) {
    renderNavbar(true, '../core/signout.php');
} else {
    renderNavbar(false, '');
}
