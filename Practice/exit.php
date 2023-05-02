<?php

    setcookie('login', $email, time() - 1800, "/");
    header("Location: index.php");
?>