<?php
require "../inc/cabecalho-admin.php";
require "../inc/funcoes-usuarios.php";
// Carregamos os dados da pessoa logada na sesssão 
$usuario =  lerUmUsuario($conexao,$_SESSION['id']);


if (isset($_POST['atualizar'])) {
  $id = $_SESSION['id'];

  $nome =  filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

  $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

  $tipo = $_SESSION['tipo'];

  /* Lógica para a senha
          Se o campo da senha do formúlario estiver vazio,
          então significa que o usuário NÃO A SENHA. */

  if (empty($_POST['senha'])) {
    $senha = $usuario['senha']; // MANTER A SENHA JA EXISTENTE NO BANCO!
  } else {

    /* Caso contrário, se o usúario digitou alguma coisa no campo
          senha, precisaremos verificar a senha */

    $senha = verificaSenha($_POST['senha'], $usuario['senha']);
  }
  atualizarUsuario($conexao, $id, $nome, $email, $tipo, $senha);

  header("location:index.php");
};

?>
<div class="row">
  <article class="col-12 bg-white rounded shadow my-1 py-4">
    <h2 class="text-center">Atualizar meu perfil</h2>

    <form action="" method="post" id="form-atualizar" name="form-atualizar" class="mx-auto w-75">
      <input class="form-control" type="hidden" name="id">

      <div class="form-group">
        <label for="nome">Nome:</label>

        <input value="<?= $usuario['nome'] ?>" class="form-control" required type="text" id="nome" name="nome" placeholder="Nome (obrigatório)">

      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>

        <input value="<?= $usuario['email'] ?>" class="form-control" required type="email" id="email" name="email" placeholder="E-mail (obrigatório)">

      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
      </div>

      <button class="btn btn-lg btn-primary" name="atualizar">Atualizar</button>
    </form>
  </article>
</div>

<?php
require "../inc/rodape-admin.php";
?>