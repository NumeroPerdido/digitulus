<?php
    session_start();
    unset($_SESSION["user"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["currency"]);
    unset($_SESSION["qtproducts"]);
    unset($_SESSION["table"]);
    header('Location: login.php');
?>