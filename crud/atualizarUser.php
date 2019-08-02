<?php
    include('actions/verificaLogin.php');
    include('actions/verificaPermission.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/modalStyle.css">
    <link rel="stylesheet" href="styles/atualizarStyle.css">
    <link rel="stylesheet" href="styles/sliderStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <script src="scripts/iniciaModal.js"></script>
    <script src="scripts/validaScript.js"></script>
    <title>CRUD - Atualizar dados</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        include_once('actions/conexao.php');
                $sql = "SELECT userName, userEmail, userPermission FROM users WHERE userID = ".$id;
                $result = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $userName = $row['userName'];
                        $userEmail = $row['userEmail'];
                        $userPermission = $row['userPermission'];
                    }
                }else{
                    echo "0 resultados";
                }
    ?>
    <div class="container">
        <a href="painel.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg></a><br>
        <h1>Atualizar dados</h1>
        <form action="actions/atualizar.php?id=<?php echo $id ?>" method="post" id="formatualizar" name="formatualizar" onsubmit="return validaFormAtualizar(this)">
            <label for="username">Nome de usuário</label>
            <input type="text" name="username" id="username" value="<?php echo $userName; ?>">
            <label for="useremail">Email</label>
            <input type="text" name="useremail" id="useremail" value="<?php echo $userEmail; ?>">
            <label for="userpermission">Administrador</label>
            <div class="checkbox-container">
                <label id="permissionlabel"><input type="checkbox" name="userpermission" id="userpermission" value="on" <?php if($userPermission == 1){ echo 'checked'; } ?>><span class="slider round"></span></label>
            </div>
            <input type="submit" value="Atualizar">
            <input type="reset" value="Voltar ao original">
        </form>
    </div>
    <div id="modal-messagebox" class="modal-container">
        <div class="modal-box">
            <h3 id="initial-title">Título</h3>
            <p id="initial-message">Ocorreu um erro ao realizar a operação.</p>
            <button class="modal-btn">Fechar</button>
        </div>
    </div>
    <?php
        if(isset($_SESSION['att_sucesso'])){
            echo "
            <script> iniciaModal('modal-messagebox','Atualização sucedida','Os dados do usuário foram atualizados.'); </script>
            ";
        }

        if(isset($_SESSION['att_erro'])){
            echo "
            <script> iniciaModal('modal-messagebox','Erro ao atualizar','Ocorreu um erro ao atualizar.'); </script>
            ";
        }

        unset($_SESSION['att_sucesso']);
        unset($_SESSION['att_erro']);
    ?>
</body>
</html>