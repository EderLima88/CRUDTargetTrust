<?php
include('conexao.php');

// por questão de seguranca validamos o envio da variavel "acao"
// $_REQUEST : o php verifica se o dado veio via POST ou via GET e extrai a informação
if ( isset($_REQUEST['acao']) ) {
  $acao = $_REQUEST['acao'];

  switch ($acao) {
    case 'inserir':
      if ( isset($_POST['nome']) && isset($_POST['sigla']) ) {
        // trim: remove espaços do inicio e final da string, e evita que seja tudo espaço também!
        $nome = trim($_POST['nome']);
        $sigla = trim($_POST['sigla']);

        // verifica se a string tem algo dentro dela realmente (ao menos um caractere)
        if ( strlen($nome) > 0 && strlen($sigla) > 0 ) {
          $sql = $conn->prepare("INSERT INTO DEPARTAMENTOS (nome, sigla) VALUES ('$nome', '$sigla')");
          $sql->execute();
        }

        header('location:listar-departamentos.php');
      }
    break;
    case 'editar':
      // implemente a edicao do departamento
      // UPDATE DEPARTAMENTOS SET sigla = '$sigla', nome = '$nome' WHERE id_departamento = '$id_departamento'
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
      // verifique se veio o id_departamento
      // se tiver vindo execute a query de exclusão do registro no banco de dados
      // redirecione o usuario para a tela de listagem
      if ( isset($_GET['id_departamento']) ) {
        $id_departamento = $_GET['id_departamento'];

        try {
          $sql = $conn->prepare("DELETE FROM DEPARTAMENTOS WHERE id_departamento = '$id_departamento'");
          $sql->execute();
        } catch(Exception $e) {
          
          header('location:listar-departamentos.php?erro=true');
          exit;
        }

        header('location:listar-departamentos.php');
      }
    break;
    default:
      // Se entrar aqui é pq não conseguiu identificar o valor da variavel "$acao"
      header('location:listar-departamentos.php');
    break;
  }

 

} else {
  // redireciona o usuario para esta pagina (redirect):
  header('location:listar-departamentos.php');
}




?>
