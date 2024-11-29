<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- CSS -->
    <?php require('../templates/common/header-head.php'); ?>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="../js/validate.js" defer></script>
</head>

<body>
    <?php require('header.php'); ?>
    <!-- Signup Form -->
    <section class="container forms">
        <div class="form">
            <div class="form-content">
                <h1 style="text-align: center" ;>Signup</h1>
                <form action="registration.php" method="post" id="signup" novalidate>
                    <div class="field input-field">
                        <input type="text" placeholder="Username" class="input" name="username" id="username">
                    </div>
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" id="email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" name="password" id="password" autocomplete="off">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password" name="repeat_password" id="repeat_password" autocomplete="off">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit" class="btn" name="signup_user">Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- JavaScript -->
<script src="../js/eye.js"></script>

</html>