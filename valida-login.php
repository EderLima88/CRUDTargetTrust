<?php
session_start();
// se vc for trabalhar com sessao no browser, o comando session_start DEVE ser o primeiro
// comando do seu código!

if ( isset($_POST['usuario']) && isset($_POST['senha']) ) {
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if ($usuario == 'admin' && $senha == '123') {
    
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'admin';

    header('location:index.php');
  } else {
    header('location:login.php');
  }
}

?>
