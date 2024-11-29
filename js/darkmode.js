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