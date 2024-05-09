<?php
$usuario = 'root';
$senha = '';

# cria a conexao com o mysql (atribui a uma variavel a conexao)
try {
  $conn = new PDO('mysql:host=localhost;dbname=empresa', $usuario, $senha);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Erro no banco de dados ' . $e->getMessage());
}
?>
