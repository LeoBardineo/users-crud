<?php
    session_start();
    include_once('conexao.php');
    include('actions/verificaLogin.php');
    include('actions/verificaPermission.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE userID=".$id;
    $res = mysqli_query($conexao, $sql);

    if($res){
        header('Location: ../painel.php');
        exit();
    }else{
        echo "Something is wrong";
    }
?>
