<?php
include('conexao.php');

// se vier o id_departamento significa que o usuario clicou no lapis (EDITAR)
if ( isset($_GET['id_departamento']) ) {
  $id_departamento = $_GET['id_departamento'];
  $titulo = "Atualizar";

  // precisamos buscar do BD as informação deste id_departamento
  $sql = $conn->prepare("SELECT * FROM DEPARTAMENTOS WHERE id_departamento = '$id_departamento'");
  $sql->execute();
  // aqui dentro esta o departamento selecionado pela query
  $r = $sql->fetchAll();

  // na duvida do pq usarmos um vetor execute um var_dump do $r
  $sigla = $r[0]['sigla'];
  $nome = $r[0]['nome'];
  $acao = 'editar';

} else {
  // caso contrário o usuário clicou no botão NOVO
  $titulo = "Cadastrar";
  $nome = '';
  $sigla = '';
  $acao = 'inserir';
  $id_departamento = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo($titulo); ?> Departamento</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/crud.css">
</head>
<body>
  <?php
  include('menu.php');
  ?>
  <div class="container">
    <h3><?php echo($titulo); ?> Departamento</h3>
    <hr>

    <div class="form-group">

      <form action="acao-departamentos.php" class="form-inline" method="POST" onsubmit="return validaDepto()">

        <input value="<?php echo($nome); ?>" type="text" name="nome" id="nome" placeholder="Digite o nome" maxlength="50" class="form-control">

        <input value="<?php echo($sigla); ?>" type="text" name="sigla" id="sigla" placeholder="Digite a sigla" maxlength="10" class="form-control">
        
        <!-- vamos criar um campo que informe para o acao-departamentos qual ação deve ser tomada -->
        <input type="hidden" name="acao" value="<?php echo($acao); ?>">

        <!-- precisamos de alguma forma informar o acao-departamentos.php QUAL o id_departamento que sera atualizado -->
        <input type="hidden" name="id_departamento" value="<?php echo($id_departamento); ?>"> 


        <!-- adicione um botão salvar com o icone do disquete -->
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i>  SALVAR</button>
      </form>
    </div>

    <div class="alert alert-danger hidden" id="erro"></div>
    

    <hr>
    <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>


  </div>
  <script src="js/form-departamentos.js"></script>
</body>
</html>
