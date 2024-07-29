<?php
    session_start();

    $_SESSION['isActive'] = false;
    header("Location: ../pages/index.php?login=loggedout");
?>