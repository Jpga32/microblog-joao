<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação
de permissão de acesso dos usuários */


/* VERIFICAR SE NÃO EXISTE UMA SESSÃO EM FUNCIONAMENTO */
    if(!isset($_SESSION)){
        session_start();
    }



    function verificaAcesso(){
        /* Verifica se NÃO EXISTE acesso  */
        if (!isset($_SESSION['id'])) {
            /* então significa que ele NÃO ESTÁ LOGADO,
            portanto apague qualquer resquicio de sessão e force o usuário a ir para login.php  */
            session_destroy();
            header("location:../login.php");
            die();
        
        }
    }

    function login (string $id, string $nome, string $email, string $tipo){
        /* Criando variavel de sessão */
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = $tipo;

    }

    function logout (){
        session_start();
        session_destroy();
        header("location:../login.php?logout");
        die ();
    }

function verificaAcessoAdmin (){
    /* Se o tipo de usuario logado NÃO for admin  */
    if($_SESSION['tipo'] != 'admin'){
        //REDIRECIONE para página não-autorizado
        header("location:nao-autorizado.php");
        die();

    }
}