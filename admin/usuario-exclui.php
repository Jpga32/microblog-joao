<?php  
require "../inc/funcoes-usuarios.php";
require "../inc/cabecalho-admin.php";
verificaAcessoAdmin();
verificaAcesso();


$id = filter_input(INPUT_GET, "id" ,FILTER_SANITIZE_NUMBER_INT);

excluirUsuario($conexao,$id);

header('location: usuarios.php');
?>