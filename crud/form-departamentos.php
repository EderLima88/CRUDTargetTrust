<?php
include('valida-sessao.php');
include('conexao.php');

if (isset($_GET['id_departamento'])) {
    
    $id_departamento = $_GET['id_departamento'];
    $titulo = "Atualizar";

    $sql = $conn->prepare("SELECT * FROM DEPARTAMENTOS WHERE id_departamento = '$id_departamento'");
    $sql->execute();
    $r =  $sql->fetchAll(); //aqui o departamento selecionado pela query
    $sigla = $r[0]['sigla'];
    $nome = $r[0]['nome'];
    $acao = 'editar';   

}else {
    
    $titulo = "Cadastrar";
    $nome = '';
    $sigla = '';
    $id_departamento = '';
    $acao = 'inserir';
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($titulo);?> Departamento</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/crud3.css">
</head>
<body>
    <?php
    include('menu.php');
    ?>
    <div class="container">
        <h3><?php echo($titulo);?> Departamento</h3>
        <hr>
        <div class="form-group">
            <form action="acao-departamentos.php" class="form-inline" method="POST" onsubmit="return validaDepto()">    
                <input value="<?php echo($nome);?>" type="text" name="nome" id="nome" placeholder="Digite o nome do Departamento" maxlength="50" class="form-control">
                <input value="<?php echo($sigla);?>" type="text" name="sigla" id="sigla" placeholder="Digite o sigla" maxlength="10" class="form-control">
                <input type="hidden" name="acao" value="<?php echo($acao); ?>">
                <input type="hidden" name="id_departamento" value="<?php echo($id_departamento); ?>">
                <button typo="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> SALVAR</button>
            </form>
        </div>
        <div class="alert alert-danger hidden" id="erro"></div>
        <hr>    
         <a href="listar-departamentos.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
    </div>
<script src="js/form-departamentos.js"></script>
</body>
</html>