<?php
include('valida-sessao.php');
include('conexao.php');

if (isset($_GET['id_funcionario'])) {
    
    $id_funcionario = $_GET['id_funcionario'];
    $titulo = "Atualizar";

    $sql = $conn->prepare("SELECT F.ID_FUNCIONARIO AS id_funcionario,
    F.NOME AS nome_func, 
    F.DT_NASCIMENTO AS dt_nascimento,
    F.DT_ADMISSAO AS dt_admissao,
    F.GENERO AS genero,
    F.SALARIO AS salario,
    F.ID_DEPARTAMENTO AS id_depto,
    D.NOME AS nome_depto
 FROM FUNCIONARIOS AS F
 INNER JOIN DEPARTAMENTOS AS D
 ON F.ID_DEPARTAMENTO = D.ID_DEPARTAMENTO WHERE id_funcionario = '$id_funcionario'");
    $sql->execute();
    $r =  $sql->fetchAll(); //aqui o funcionario selecionado pela query
  
    $nome = $r[0]['nome_func'];
    $dt_nasc = $r[0]['dt_nascimento'];
    $dt_adm = $r[0]['dt_admissao'];
    $gen = $r[0]['genero'];
    $sal = $r[0]['salario'];
    $dep = $r[0]['id_depto'];
    $acao = 'editar';   

}else {
    
    $titulo = "Cadastrar";
    $nome = '';
    $dt_nasc = '';
    $dt_adm = '';
    $gen = '';
    $sal = '';
    $id_funcionario = '';
    $dep = '';
    $acao = 'inserir';
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($titulo);?> Funcionários</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/crud3.css">
</head>
<body>
    <?php
    include('menu.php');
    ?>
    <div class="container">
    <h3><?php echo($titulo);?> Funcionario</h3>
    <hr>
    <div class="form-group">
        <form action="acao-funcionarios.php" class="form-inline" method="POST" onsubmit="return validaF()">           
                
                <div class="ladolado">
                <label for="nome">Nome</label>
                <input value="<?php echo($nome);?>" type="text" name="nome" id="nome" placeholder="Digite o nome" maxlength="50" class="form-control">
                </div>

                <div class="ladolado">
                <label for="dt_nasc">Data de Nacimento</label>       
                <input value="<?php echo($dt_nasc);?>" type="date" name="dt_nasc" id="dt_nasc" placeholder="Digite Data Nascimento" maxlength="10" class="form-control">
                </div>

                <div class="ladolado">
                <label for="dt_adm">Data de Admissão</label>
                <input value="<?php echo($dt_adm);?>" type="date" name="dt_adm" id="dt_adm" placeholder="Digite data admissão" maxlength="50" class="form-control">
                </div>

                <div class="ladolado">
                <label for="genero">Genero</label>
                <select name="gen" id="genero" class="form-control">
                    <option value="">Selecione o genero</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                </div>
                 
                <!--<input value="<?php echo($gen);?>" type="text" name="gen" id="genero" placeholder="Digite o genero" maxlength="10" class="form-control">-->
                
                <div class="ladolado2">
                <div class="form-group">
                <label for="sal">Salário</label>
                    <div class="input-group">                  
                        <div class="input-group-addon">$$</div>                   
                            <input value="<?php echo($sal);?>" type="text" name="sal" id="sal" placeholder="Digite o salario" maxlength="50" class="form-control">
                        </div>
                </div>
                </div>
                

                <?php
                    $sqld = $conn->prepare("SELECT * FROM departamentos");
                    $sqld->execute();
                    $rd =  $sqld->fetchAll();
                ?>
                   <div class="ladolado2">
                   <label for="sal">Departamento</label>
                    <select name="seletor_dp" id="dep" class="form-control"> <!-- -->
                    <option value="0">Escolha o departamento</option><!-- -->
                    </div>
                <?php
                    foreach ($rd as $r) {
                        if ($r['id_departamento'] == $dep) {
                            $seleciona = 'selected';
                        
                        }else {
                            $seleciona = '';
                        } 
                ?>
                    <option <?php echo $seleciona;?> value="<?php echo ($r['id_departamento'])?>"><?php echo ($r['nome']);?></option> 
                <?php
                }
                ?>
                </select>
                
               
                <input type="hidden" name="acao" value="<?php echo($acao); ?>">
                <input type="hidden" name="id_funcionario" value="<?php echo($id_funcionario); ?>">
                <button typo="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> SALVAR</button>
        </form>
    </div>
        <div class="alert alert-danger hidden" id="erro"></div>
        <hr>    
    <a href="listar-funcionarios.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> VOLTAR</a>
</div>
<script src="js/form-funcionarios.js"></script>
</body>
</html>