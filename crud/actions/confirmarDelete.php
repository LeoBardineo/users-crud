<?php
    session_start();
    include('actions/verificaLogin.php');
    include('actions/verificaPermission.php');

    $id = $_GET['id'];
    if(!isset($_SESSION['confirma_delete'])){
        $_SESSION['modal_delete'] = true;
        $_SESSION['id_delete'] = $id;
        header('Location: ../painel.php');
        exit();
    }
?>
