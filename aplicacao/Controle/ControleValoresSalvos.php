<?php
require_once '../Modelo/ClassValoresSalvos.php';
require_once '../Modelo/DAO/ClassValoresSalvosDAO.php';

$id =@$_POST['idex'];
$valorTotal = @$_POST['valorTotal'];
$idCliente = @$_POST['idCliente'];
$acao = $_GET['ACAO'];

$novoValor = new ClassValoresSalvos();
$novoValor->setId($id);
$novoValor->setIdCliente($idCliente);
$novoValor->setValorTotal($valorTotal);

$classValoresSalvosDAO = new ClassValoresSalvosDAO();
switch ($acao) {
	case "cadastrarValor":
        $valor = $classValoresSalvosDAO->cadastrar($novoValor);
	    if($valor >= 1){
            header('Location:../salvos.php?&MSG= Cadastro realizado com sucesso!');
        } else {
            // header('Location:../salvos.php?&MSG= Não foi possivel realizar o cadastro!');
            echo "$valor";
        }
        break;
    
    case "excluirValor":
        if (isset($_GET['idex'])) {
            $id = $_GET['idex'];
            $classValoresSalvosDAO = new ClassValoresSalvosDAO();
            $us = $classValoresSalvosDAO->excluirValorSalvo($id);
            if ($us == TRUE) {
                header('Location:../salvos.php?PAGINA=listarValoresSalvos&MSG= Valor foi excluido com sucesso!');
            } else {
                header('Location:../salvos.php?PAGINA=listarValoresSalvos&MSG=Não foi possivel realizar a exclusão do Valor!');
            }
        }
        break;
    default :
        break;	
 }
?>