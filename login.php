<?php
if (isset($_POST['email'])) {

  include_once ('index.html');
  include_once ('conexao.php');

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $result = $conexao->query("SELECT * FROM usuarios WHERE email='$email' and senha='$senha'");

  if ($result->num_rows > 0) {
    echo "<script>window.location.href = 'table.php'; </script>";
  } else {
    $error = $conexao->error;
    echo "<script>Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Senha ou email incorretos',
              });</script>";
  }


}