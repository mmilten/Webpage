document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    const icon = themeToggle.querySelector("i");

    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        icon.classList.replace("fa-sun", "fa-moon");
    }

    themeToggle.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        const isDark = document.body.classList.contains("dark-mode");
        if (isDark) {
            icon.classList.replace("fa-sun", "fa-moon");
        } else {
            icon.classList.replace("fa-moon", "fa-sun");
        }
        localStorage.setItem("theme", isDark ? "dark" : "light");
    });
});
