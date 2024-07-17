<?php
if (!empty($_GET['id'])) {

  include_once ('conexao.php');

  $id = $_GET['id'];

  $resultado = $conexao->query("SELECT * FROM usuarios WHERE id_usuario = $id");

  $user = $resultado->fetch_assoc();

  $nome = $user['nome'] ?? '';
  $email = $user['email'] ?? '';
  $senha = $user['senha'] ?? '';

  include_once ('cadastro.html');
  echo "<script> 
    var input = document.createElement('input');
    
    input.type = 'hidden';
    input.name = 'id_usuario';
    input.value = $id;

    form = document.getElementById('form')

    form.appendChild(input) </script>";

  echo "<script>
    document.getElementById('name').value = '$nome';
    document.getElementById('email').value = '$email';
    document.getElementById('senha').type = 'text';
    document.getElementById('senha').value = '$senha';
    </script>";
}




