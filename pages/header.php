<?php
require_once('../core/config.php');
require_once('../core/controller.Class.php');

function renderNavbar($isLoggedIn, $logoutLink)
{
    echo '
    <header>
        <a href="#" class="logo">LOGO</a>

        <!-- Search bar -->
        <form class="searchbar" action="index.php" method="POST">
            <input type="text" name="search" placeholder="Search..." required>
            <button type="submit" name="submit">Search</button>
        </form>

        <!-- Dark/Light Mode Toggle -->
        <button id="theme-toggle" class="theme-toggle">
            <span class="theme-icon">🌞</span>
        </button>
        
        <nav class="navbar">';

    if ($isLoggedIn) {
        echo '
            <div class="dropdown">
                <button class="dropbtn">Menu +</button>
                <div class="dropdown-content">
                    <a href="#" id="profile-link">Profile</a>
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
?>

<!-- JavaScript for Dark/Light Mode Toggle -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButton = document.getElementById("theme-toggle");
        const body = document.body;
        const themeIcon = toggleButton.querySelector(".theme-icon");

        // Check for saved theme preference
        if (localStorage.getItem("theme") === "dark") {
            body.classList.add("dark-mode");
            themeIcon.textContent = "🌜";
        }

        toggleButton.addEventListener("click", function() {
            body.classList.toggle("dark-mode");
            if (body.classList.contains("dark-mode")) {
                themeIcon.textContent = "🌜";
                localStorage.setItem("theme", "dark");
            } else {
                themeIcon.textContent = "🌞";
                localStorage.setItem("theme", "light");
            }
        });
    });
</script>