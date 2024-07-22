<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location.href = 'login.html';</script>";
    exit();
}

include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="_css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      $('#tabela-exemplo').DataTable();
    });
  </script>
</head>

<body>
  <section class="system">
    <div class="container">
      <h1 class="display-6 mb-4">Listar Usuários</h1>
      <table id="tabela-exemplo" class="table table-striped table-hover display">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>data</th>
            <th>Status</th>
            <th>#</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $listagem = $conexao->query("SELECT * FROM usuarios ORDER BY id_usuario DESC");
          
          while ($user = $listagem->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $user['id_usuario'] . "</td>";
            echo "<td>" . $user['nome'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['senha'] . "</td>";
            echo "<td>" . $user['data_criacao'] . "</td>";
            echo "<td>" . $user['status'] . "</td>";
            echo "<td>
                 <a class='btn btn-sm btn-primary' href='edit.php?id=$user[id_usuario]';>
                    <svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M4 21a1 1 0 0 0 .24 0l4-1a1 1 0 0 0 .47-.26L21 7.41a2 2 0 0 0 0-2.82L19.42 3a2 2 0 0 0-2.83 0L4.3 15.29a1.06 1.06 0 0 0-.27.47l-1 4A1 1 0 0 0 3.76 21 1 1 0 0 0 4 21zM18 4.41 19.59 6 18 7.59 16.42 6zM5.91 16.51 15 7.41 16.59 9l-9.1 9.1-2.11.52z'></path></svg>
                    </a>
            </td>";
            echo "<td>
                <a class='btn btn-sm btn-danger' onclick='deletar($user[id_usuario])'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z'></path><path d='M9 10h2v8H9zm4 0h2v8h-2z'></path></svg>
                    </a>
               </td>";
            ;
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="d-flex justify-content-end mt-3">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <script>
      function deletar(id) {
        Swal.fire({
          title: "Tem certeza?",
          text: "Você não poderá reverter isso!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sim, delete!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'delete.php?id=' + id;
          }
        });
      }
    </script>
  </section>
</body>

</html>