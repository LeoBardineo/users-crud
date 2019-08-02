<?php
    include('actions/verificaLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/painelStyle.css">
    <link rel="stylesheet" href="styles/modalStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
    <script src="scripts/iniciaModal.js"></script>
    <title>CRUD - Painel</title>
</head>
<body>
    <a id="logout" href="actions/logout.php">Logout</a>
    <div class="container">
        <h1>Tabela de usuários</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de registro</th>
                <th>Administrador</th>
                <?php if($_SESSION['userPermission']==1){ echo "<th>Opções</th>"; } ?>
            </tr>
            <?php
                include_once('actions/conexao.php');
                $sql = "SELECT userID, userName, userEmail, dateRegister, userPermission FROM users";
                $result = mysqli_query($conexao, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['userID']."</td>";
                        echo "<td>".$row['userName']."</td>";
                        echo "<td>".$row['userEmail']."</td>";
                        echo "<td>".$row['dateRegister']."</td>";
                        if($row['userPermission'] == 0){echo "<td>Não</td>";}
                        if($row['userPermission'] == 1){echo "<td>Sim</td>";}
                        if($_SESSION['userPermission']==0){
                            echo "</tr>";
                        }
                        if($_SESSION['userPermission']==1){
                            echo '<td><a href=atualizarUser.php?id='.$row['userID'].'><button title="Editar" class="link-btn update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 14 16"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"/></svg>
                        </button></a>
                        <a href=actions/confirmarDelete.php?id='.$row['userID'].'><button title="Excluir" class="link-btn delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 12 16"><path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"/></svg>
                        </button></a></td>';
                            echo "</tr>";
                        }
                    }
                }else{
                    echo "0 resultados";
                }
            ?>
        </table>
    </div>
    <div id="modal-messagebox" class="modal-container">
        <div class="modal-box">
            <h3 id="initial-title">Título</h3>
            <p id="initial-message">Mensagem.</p>
            <div class="buttons">
                <a class="delete-btn" href="actions/deletar.php?id='<?php if(isset($_SESSION['id_delete'])){ echo $_SESSION['id_delete']; } ?>'"><button class="modal-btn">Deletar</button></a>
                <button class="modal-btn">Cancelar</button>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['modal_delete'])){
            echo "<script> iniciaModal('modal-messagebox','Deletar usuário','Tem certeza que deseja deletar o usuário?'); </script>";
        }
        unset($_SESSION['modal_delete']);
        unset($_SESSION['id_delete']);
        unset($_SESSION['confirma_delete']);
    ?>
</body>
</html>