<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
    echo '<p>u cul!</p>';
    echo '<a href="megasecret.php">only for megaculs</a>';
}
?>