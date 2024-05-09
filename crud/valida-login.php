<?php
session_start(); //DEVE ser o primeiro quando usar sessao
include('conexao.php');

if ( isset($_POST['usuario']) && isset($_POST['senha']) ) {
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  
  $senha_cripto = md5($senha); // comparação com a senha do banco 

  // validacao no banco
  $sql = $conn->prepare("SELECT * FROM USUARIOS 
                          WHERE usuario = '$usuario' AND senha = '$senha_cripto'");
  $sql->execute();
  $r = $sql->fetchAll();

  if ( sizeof($r) > 0 ) {
    
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $r[0]['usuario'];

    header('location:index.php');
  } else {
    header('location:login.php');
  }
}

?>
