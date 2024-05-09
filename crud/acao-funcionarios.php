<?php
include('valida-sessao.php');
include('conexao.php');


if (isset($_REQUEST['acao']) ) {
    $acao = $_REQUEST['acao'];

    switch ($acao) {
        case 'inserir':
            if (isset($_POST['nome']) && isset($_POST['dt_nasc']) && isset($_POST['dt_adm']) && isset($_POST['gen']) && isset($_POST['sal']) && isset($_POST['seletor_dp']) ) {
                $nome = trim($_POST['nome']);
                $dt_nasc = trim($_POST['dt_nasc']);
                $dt_adm = trim($_POST['dt_adm']);
                $genero = trim($_POST['gen']);
                $sal = trim($_POST['sal']);
                $dep = trim($_POST['seletor_dp']); 
                
                if (strlen($nome) > 0 && strlen($dt_nasc) > 0 && strlen($dt_adm) > 0 && strlen($genero) > 0 && strlen($sal) > 0 )   {
                $sql = $conn->prepare("INSERT INTO FUNCIONARIOS (nome, dt_nascimento, dt_admissao, genero, salario,id_departamento) VALUES('$nome','$dt_nasc','$dt_adm','$genero','$sal','$dep')");
                $sql->execute();
                }
                header('location:listar-funcionarios.php');
            }
        break;       

        case 'editar':            
            if (isset($_POST['nome']) && isset($_POST['dt_nasc']) && isset($_POST['dt_adm']) && isset($_POST['gen']) && isset($_POST['sal']) && isset($_POST['seletor_dp']) ) {
                $id_funcionario = $_POST['id_funcionario']; // variável dos campos do formulário form-funcionarios.php
                $nome = trim($_POST['nome']);
                $dt_nasc = trim($_POST['dt_nasc']);
                $dt_adm = trim($_POST['dt_adm']);
                $genero = trim($_POST['gen']);
                $sal = trim($_POST['sal']);
                $dep = trim($_POST['seletor_dp']);   //o que vem por $_POST?     
        
                if (strlen($nome) > 0 && strlen($dt_nasc) > 0 && strlen($dt_adm) > 0 && strlen($genero) > 0 && strlen($sal) > 0 ) {
                  $sql = $conn->prepare("UPDATE FUNCIONARIOS SET nome = '$nome', dt_nascimento = '$dt_nasc', dt_admissao = '$dt_adm', genero = '$genero', salario = '$sal', id_departamento = '$dep' WHERE id_funcionario = '$id_funcionario'");
                  $sql->execute();
                }       
                header('location:listar-funcionarios.php');             
            }

        break;
        case 'excluir':
            if (isset($_GET['id_funcionario'])) {
                $id_funcionario = $_GET['id_funcionario'];
                    try {
                    $sql = $conn->prepare("DELETE FROM funcionarios WHERE id_funcionario = '$id_funcionario'");
                    $sql->execute();
                    } catch(Exception $e) {
                    header('location:listar-funcionarios.php?erro=true');   
                    exit;
                    }
                     header('location:listar-funcionarios.php');
            }       
        break;
        default:
            header('location:listar-departamentos.php');
        break;

    }

} else {
    header('location:listar-departamentos.php');
}

?>