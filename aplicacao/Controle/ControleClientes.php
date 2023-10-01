<?php
require_once '../Modelo/ClassClientes.php';
require_once '../Modelo/DAO/ClassClientesDAO.php';

$id =@$_POST['idex'];
$nome = @$_POST['nome'];
$email = @$_POST['email'];
$endereco = @$_POST['endereco'];
$acao = $_GET['ACAO'];

$novoCliente = new ClassClientes();
$novoCliente->setId($id);
$novoCliente->setNome($nome);
$novoCliente->setEmail($email);
$novoCliente->setEndereco($endereco);

$classClientesDAO = new ClassClientesDAO();
switch ($acao) {
	case "cadastrarCliente":
        $cliente = $classClientesDAO->cadastrar($novoCliente);
	    if($cliente >= 1){
            header('Location:../clientes.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location:../clientes.php?&MSG= Não foi possivel realizar o cadastro!');
        }
        break;
    
    case "excluirCliente":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classClientesDAO = new ClassClientesDAO();
            $us = $classClientesDAO->excluirClientes($id);
            if ($us == TRUE) {
                header('Location:../clientes.php?PAGINA=listarClientes&MSG= Cliente foi excluido com sucesso!');
            } else {
                header('Location:../clientes.php?PAGINA=listarClientes&MSG=Não foi possivel realizar a exclusão do Usurio!');
            }
        }
        break;
    default :
        break;	
 }
?>