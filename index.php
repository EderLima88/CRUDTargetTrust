<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  <?php
  include('menu.php');
  ?>
  <div class="container">
    <h3>Bem vindo</h3>

    <a href="listar-departamentos.php" class="btn btn-default">Listar Departamentos</a>


  </div>
  
</body>
</html>
