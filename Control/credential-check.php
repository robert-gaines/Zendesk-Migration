<?php session_start() ?>

<?php


    if(!isset($_SESSION['USERNAME']) || !isset($_SESSION['USER_PASS']))
    {
        header("Location: ../index.php");
    }


 ?> 