<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_id']==1) {
    echo '<p>oaoaoaoaoaoao</p>';
} else {
    echo '<p>no</p>';
}
?>