<?php
    setcookie("user", "", time() - 3600, "/");
    setcookie("pass", "", time() - 3600, "/");
    header("Location: page.php");
    exit();
?>
