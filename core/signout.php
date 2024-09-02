<?php
session_start();

session_destroy();
setcookie('id', '', time() - 60 * 60 * 24 * 30, '/');
setcookie('sess', '', time() - 60 * 60 * 24 * 30, '/');
header('Location: ../pages/login.php');
exit;
