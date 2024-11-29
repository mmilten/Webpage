<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php require('../templates/common/header-head.php'); ?>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <?php require('session.php'); ?>
</head>

<body>
    <?php require('header.php'); ?>
    <!-- Login form | connected using login.php-->
    <section class="container forms">
        <div class="form">
            <div class="form-content">
                <h1 style="text-align: center" ;>Login</h1>
                <?php if ($is_invalid): ?>
                    <em>Invalid login</em>
                <?php endif; ?>
                <form action="login.php" method="post">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password" autocomplete="on">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type="submit" class="btn" name="login_user">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signup.php">Signup</a></span>
                </div>
            </div>

            <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field google">
                    <img src="../images/google.png" alt="" class="google-img">
                    <button class="googlebtn" onclick="window.location = '<?php echo $login_url; ?>' ">Sign In with Google</button>
                </a>
            </div>
        </div>
    </section>
</body>
<!-- JavaScript -->
<script src="../js/eye.js"></script>

</html>