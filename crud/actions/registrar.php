<?php
    session_start();
    include_once('conexao.php');

    $options = [ 'cost' => 10 ];
    $username = mysqli_real_escape_string($conexao, trim($_POST['username']));
    $useremail = mysqli_real_escape_string($conexao, trim($_POST['useremail']));
    $userpassword = mysqli_real_escape_string($conexao, trim($_POST['userpassword']));
    $passwordhashed = password_hash($userpassword, PASSWORD_DEFAULT, $options);
    $userpermission = (isset($_POST['userpermission'])) ? 1 : 0;
    date_default_timezone_set('America/Sao_Paulo');
    $date = date("d/m/Y");

    $sql = "SELECT COUNT(*) AS total FROM users WHERE userName = '$username'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true;
        header('Location: ../registro.php');
        exit;
    }

    $sql = "SELECT COUNT(*) AS total FROM users WHERE userEmail = '$useremail'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['email_existe'] = true;
        header('Location: ../registro.php');
        exit;
    }
    
    $sql = "INSERT INTO users (userName, userEmail, userPassword, dateRegister, userPermission) VALUES ('$username','$useremail','$passwordhashed','$date', '$userpermission')";

    if($conexao->query($sql) === true){
        $_SESSION['status_cadastro'] = true;
        $conexao->close();
        header('Location: ../registro.php');
        exit;
    }
?>