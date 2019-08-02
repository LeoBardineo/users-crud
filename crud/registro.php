<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/regiStyle.css">
    <link rel="stylesheet" href="styles/modalStyle.css">
    <link rel="stylesheet" href="styles/sliderStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <script src="scripts/validaScript.js"></script>
    <script src="scripts/iniciaModal.js"></script>
    <title>CRUD - Registro</title>
</head>
<body>
    <div class="login-container">
        <h1>Registre-se</h1>
        <form action="actions/registrar.php" method="post" onsubmit="return validaFormRegistro(this)" class="input-container" name="formRegistro">
            <input type="text" name="username" id="username" placeholder="Nome de usuário">
            <input type="email" name="useremail" id="useremail" placeholder="Email">
            <input type="password" name="userpassword" id="userpassword" placeholder="Senha">
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmar senha">
            <div class="checkbox-container">
                <label id="permissionlabel"><input type="checkbox" name="userpermission" id="userpermission" value="on"><span class="slider round"></span></label><span id="labeltext">Admnistrador</span>
            </div>
            <input type="submit" value="Registrar" name="submitbtn" id="submitbtn">
        </form>
        <div class="links">
            <a href="index.php">Já tem uma conta?</a>
        </div>
    </div>
    <div id="modal-messagebox" class="modal-container">
        <div class="modal-box">
            <h3 id="initial-title">Título</h3>
            <p id="initial-message">Ocorreu um erro ao realizar a operação.</p>
            <button class="modal-btn">Fechar</button>
        </div>
    </div>
        <?php
        if(isset($_SESSION['status_cadastro'])){
            echo "
            <script> iniciaModal('modal-messagebox','Autenticado com sucesso','Agora você pode realizar o login <a href=index.php>aqui.</a>'); </script>
            ";
        }
        
        if(isset($_SESSION['usuario_existe'])){
            echo "
            <script> iniciaModal('modal-messagebox','Erro ao cadastrar','O nome de usuário digitado já existe.'); </script>
            ";
        }
        
        if(isset($_SESSION['email_existe'])){
            echo "
            <script> iniciaModal('modal-messagebox','Erro ao cadastrar','O email digitado já existe.'); </script>
            ";
        }
        
        unset($_SESSION['usuario_existe']);
        unset($_SESSION['email_existe']);
        unset($_SESSION['status_cadastro']);
        ?>
</body>
</html>