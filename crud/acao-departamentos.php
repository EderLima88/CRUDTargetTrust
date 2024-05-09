<?php
include('valida-sessao.php');
include('conexao.php');


if (isset($_REQUEST['acao']) ) {
    $acao = $_REQUEST['acao'];

    switch ($acao) {
        case 'inserir':
            if (isset($_POST['nome']) && isset($_POST['sigla'])) {
                $nome = trim($_POST['nome']);
                $sigla = trim($_POST['sigla']);
                
                if (strlen($nome) > 0 && strlen($sigla) > 0){
                $sql = $conn->prepare("INSERT INTO DEPARTAMENTOS (nome, sigla) VALUES('$nome','$sigla')");
                $sql->execute();
                }
                header('location:listar-departamentos.php');

            }
        break;
       
        

        case 'editar':            
            if ( isset($_POST['nome']) && isset($_POST['sigla']) && isset($_POST['id_departamento'])) {
                $id_departamento = $_POST['id_departamento'];
                $nome = trim($_POST['nome']);
                $sigla = trim($_POST['sigla']);        
        
                if ( strlen($nome) > 0 && strlen($sigla) > 0 ) {
                  $sql = $conn->prepare("UPDATE DEPARTAMENTOS SET 
                                            sigla = '$sigla', 
                                            nome = '$nome'
                                          WHERE id_departamento = '$id_departamento'");
                  $sql->execute();
                }
        
                header('location:listar-departamentos.php');
              
            }

        break;
        case 'excluir':
            if (isset($_GET['id_departamento'])) {
                $id_departamento = $_GET['id_departamento'];
                    try {
                    $sql = $conn->prepare("DELETE FROM DEPARTAMENTOs WHERE id_departamento = '$id_departamento'");
                    $sql->execute();
                    } catch(Exception $e) {
                    header('location:listar-departamentos.php?erro=true');   
                    exit;
                    }
                     header('location:listar-departamentos.php');
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