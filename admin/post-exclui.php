<?php 
require "../inc/funcoes-posts.php";
require "../inc/cabecalho-admin.php";

verificaAcesso();

$idExcluir = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


excluirPost($conexao, $idExcluir);

header("location:posts.php")
?>
