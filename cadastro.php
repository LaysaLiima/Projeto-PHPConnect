<?php
if (isset($_POST['nome'])) {

  include_once ('conexao.php');
  include_once ('cadastro.html');

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  if (isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];
    $result = $conexao->query("UPDATE usuarios SET  nome='$nome', email='$email', senha='$senha' WHERE id_usuario = $id");
    echo "<script>window.location.href = 'table.php';</script>";
    exit();
  }

  $result = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");

  if ($result->num_rows > 0) {
    echo "<script>Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Usuário já existe',
      });</script>";
    ;
  } else {
    $result = $conexao->query("INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')");

    if ($result) {
      echo "<script>window.location.href = 'index.html';</script>";
    } else {
      $error = $conexao->error;
      echo "<script>alert('Error: $error');</script>";
    }
  }
}
