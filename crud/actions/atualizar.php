<?php
    session_start();
    include_once('conexao.php');

    $id = $_GET['id'];
    $username = mysqli_real_escape_string($conexao, trim($_POST['username']));
    $useremail = mysqli_real_escape_string($conexao, trim($_POST['useremail']));
    $userpermission = (isset($_POST['userpermission'])) ? 1 : 0;

    $sql = "UPDATE users SET userName = '$username', userEmail = '$useremail', userPermission = '$userpermission' WHERE userID=".$id;
    $res = mysqli_query($conexao ,$sql);

    if($res){
        $_SESSION['att_sucesso'] = true;
        header('Location: ../atualizarUser.php?id='.$id);
        $conexao->close();
        exit();
    }else{
        $_SESSION['att_erro'] = true;
        header('Location: ../atualizarUser.php?id='.$id);
        exit();
    }
?>