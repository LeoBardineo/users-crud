<?php
    session_start();
    include_once('conexao.php');

    $username = mysqli_real_escape_string($conexao, trim($_POST['username']));
    $userpassword = mysqli_real_escape_string($conexao, trim($_POST['userpassword']));

    $query = "SELECT userID, userName, userPassword, userPermission FROM users WHERE username = '$username'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    if($row==1){
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($userpassword, $row['userPassword'])){
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['userPermission'] = $row['userPermission'];
                header('Location: ../painel.php');
                exit;
            }else{
                $_SESSION['nao_autenticado']=true;
                header('Location: ../index.php');
                exit();
            }
        }
    }else{
        $_SESSION['nao_autenticado']=true;
        header('Location: ../index.php');
        exit();
    }
?>