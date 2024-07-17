<?php
if (!empty($_GET['id'])) {

  include_once ('conexao.php');

  $id = $_GET['id'];

  $result = $conexao->query("SELECT * FROM usuarios WHERE id_usuario = $id");

  $user = $result->fetch_assoc();

  if ($result->num_rows > 0) {

    $result = $conexao->query("DELETE FROM usuarios WHERE id_usuario = $id");
    echo "<script>window.location.href = 'table.php';</script>";
    exit();
  }
}



