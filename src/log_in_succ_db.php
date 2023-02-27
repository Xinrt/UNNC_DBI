<?php
    $salerep = isset($_POST['salerep']) ? $_POST['salerep'] : "";

    session_start(); 
    $_SESSION['salerep'] = $salerep;
    header("Location:mask_page.php");
?>


