<?php
    if($_SESSION['userPermission']!=1){
        header('Location: painel.php');
        exit();
    }
?>