<?php
    session_start();
    if(!$_SESSION['userID']){
        header('Location: index.php');
        exit();
    }
?>