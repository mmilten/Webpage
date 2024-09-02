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
        <form class="searchbar" action="#" method="GET">
            <input type="text" name="query" placeholder="Search..." required>
            <button type="submit">Search</button>
        </form>';

    echo '
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">About</a>';

    if ($isLoggedIn) {
        echo '
            <div class="dropdown">
                <button class="dropbtn">Menu +</button>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
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
