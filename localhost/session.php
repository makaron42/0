<?php
session_start();
$new_url = "welcome.php";
if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: ".$new_url);
    exit();
}
?>