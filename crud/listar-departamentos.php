<?php
include('valida-sessao.php'); 
include('conexao.php');

$sql = $conn->prepare('SELECT * FROM DEPARTAMENTOS ORDER BY nome');
$sql->execute();
$resultados = $sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Departamentos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <?php
    include('menu.php');
    ?>    
    <div class="container">
        <h3>Listar Departamentos</h3>
        <hr>
        <a href="form-departamentos.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Novo</a>
        <hr>
        <?php
        if (isset($_GET['erro'])) {    
        ?>
            <div class="alert alert-warning">
                <i class="glyphicon glyphicon-warning-sign"></i> ERRO NA EXCLUSÃO - DEPARTAMENTO POSSUI FUNCIOANRIOS VINCULADOS
            </div>
        <?php
        }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th class="text-right">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($resultados as $r) {
                ?>                    
                <tr>
                    <td><?php echo($r['nome']);?></td>
                    <td><?php echo($r['sigla']);?></td>
                    <td class="text-right">
                        <a href="form-departamentos.php?id_departamento=<?php echo($r['id_departamento']);?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="acao-departamentos.php?acao=excluir&id_departamento=<?php echo($r['id_departamento']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir')"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>                        
            </tbody>        
        </table>
        <hr>
        <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
    </div>    
</body>
</html>