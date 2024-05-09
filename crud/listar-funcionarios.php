<?php
include('valida-sessao.php'); 
include('conexao.php');
//=========================paginacao==============================
$pagina_atual = (isset($_GET['page'])) ? $_GET['page'] : 1;

$result_pag = 30;

$inicioExibir = ($result_pag * $pagina_atual) - $result_pag;
//================================================================
$sql = $conn->prepare("SELECT F.ID_FUNCIONARIO AS id_funcionario,
       F.NOME AS nome_func, 
       DATE_FORMAT(F.DT_NASCIMENTO, '%d/%m/%Y') AS dt_nascimento,
       DATE_FORMAT(F.DT_ADMISSAO, '%d/%m/%Y') AS dt_admissao,
       F.GENERO AS genero,
       F.SALARIO AS salario,
       F.ID_DEPARTAMENTO AS id_depto,
       D.NOME AS nome_depto
	FROM FUNCIONARIOS AS F
    INNER JOIN DEPARTAMENTOS AS D
    ON F.ID_DEPARTAMENTO = D.ID_DEPARTAMENTO ORDER BY F.NOME LIMIT $inicioExibir, $result_pag"); //trazer o nome do departamento para mostrar nome departamento
$sql->execute();
$resultados = $sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Funcionarios</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <?php
    include('menu.php');
    ?>    
<div class="container">
        <h3>Listar Funcionarios</h3>
        <hr>
        <a href="form-funcionarios.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Novo</a>
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
                    <th>Data de nascimento</th>
                    <th>Data de admissão</th>
                    <th>Genero</th>
                    <th>Salario</th>
                    <th>Nome departamento</th>
                    <th class="text-right">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($resultados as $r) {
                ?>                    
                <tr>
                    <td><?php echo($r['nome_func']);?></td>
                    <td><?php echo($r['dt_nascimento']);?></td>
                    <td><?php echo($r['dt_admissao']);?></td>
                    <td><?php echo($r['genero']);?></td>
                    <td><?php echo($r['salario']);?></td>
                    <td><?php echo($r['nome_depto']);?></td>
                    
                    <td class="text-right">
                        <a href="form-funcionarios.php?id_funcionario=<?php echo($r['id_funcionario']);?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="acao-funcionarios.php?acao=excluir&id_funcionario=<?php echo($r['id_funcionario']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir')"><i class="glyphicon glyphicon-trash"></i></a>
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
<!-- =========================paginacao============================== -->
<?php
$pagina_atual = (isset($_GET['page'])) ? $_GET['page'] : 1;
$inicioExibir = ($result_pag * $pagina_atual) - $result_pag;

$sql_indice = $conn->prepare("SELECT nome FROM funcionarios"); //trazer o nome do departamento para mostrar nome departamento
$sql_indice->execute();
$result = $sql_indice->fetchAll();

$total_func = ceil(count($result) / $result_pag); //este é o total de páginas que dará 24 funcionarios na tela
$inicioExibir = ($result_pag * $pagina_atual) - $result_pag;
?>

    <nav class="text-center">
        <ul class="pagination">
<?php
    for ($i=1; $i <= $total_func; $i++) {
        if ($i == $pagina_atual) { 
            $ativo = 'active';
          
        } else {
            $ativo = '';
        }
?>
    <li class="<?php echo $ativo;?>"><a href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php    
}
?>
        </ul>
    </nav>
<!-- ==================================================================== -->
</body>
</html>