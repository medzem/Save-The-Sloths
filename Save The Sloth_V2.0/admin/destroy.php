<?php
    session_start();
    unset($_SESSION['login_user_id']);
    header("location: login.php");
?>