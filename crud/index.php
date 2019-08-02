<?php
    session_start();
    if(isset($_SESSION['userID'])){
        header('Location: painel.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/loginStyle.css">
    <link rel="stylesheet" href="styles/modalStyle.css">
    <script src="scripts/validaScript.js"></script>
    <script src="scripts/iniciaModal.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <title>CRUD - Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Olá, seja bem-vindo!</h1>
        <div class="user-photo">
            <img src="images/clipboard-flat.png" alt="">
        </div>
        <form action="actions/logar.php" method="post" class="input-container" name="formLogin" onsubmit="return validaFormLogin(this)">
            <input type="text" name="username" id="username" placeholder="Nome de usuário">
            <input type="password" name="userpassword" id="userpassword" placeholder="Senha">
            <input type="submit" value="Logar" name="submitbtn" id="submitbtn">
        </form>
        <div class="links">
            <a href="#">Esqueceu a senha?</a>
            <a href="registro.php">Não tem uma conta?</a>
        </div>
    </div>
    <div id="modal-messagebox" class="modal-container">
        <div class="modal-box">
            <h3 id="initial-title">Título</h3>
            <p id="initial-message">Mensagem.</p>
            <button class="modal-btn">Fechar</button>
        </div>
    </div>
    <?php
        if(isset($_SESSION['nao_autenticado'])){
            echo "
            <script> iniciaModal('modal-messagebox','Erro ao autenticar','Usuário ou senha inválidos.'); </script>
            ";
        }
        unset($_SESSION['nao_autenticado']);
    ?>
</body>
</html>