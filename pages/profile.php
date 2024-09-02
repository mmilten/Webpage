<section class="profile">
    <div class="profile_form">
        <div class="profile_content">
            <h1>Profile Information</h1>
            <form>
                <?php if (isset($user)): ?>
                    <p>Hello, <?= htmlspecialchars($user["username"]) ?> (<?= htmlspecialchars($user["email"]) ?>)</p>
                <?php endif; ?>
                <?php
                if (isset($_COOKIE["id"]) && isset($_COOKIE["sess"])) {
                    $Controller = new Controller;
                    if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["sess"])) {
                        echo $Controller->printData(intval($_COOKIE["id"]));
                    } else {
                        echo "Error!";
                    }
                } else {
                }
                ?>
            </form>
        </div>
    </div>
</section>