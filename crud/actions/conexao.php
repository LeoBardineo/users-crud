<?php
define ('HOST', '127.0.0.1');
define ('USUARIO', 'root');
define ('SENHA', '');
define ('DB', 'crudnotepad');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar ao banco de dados!');
?>