<?php
require_once 'Conexao.php';
class ClassValoresSalvosDAO
{
    public function cadastrar(ClassValoresSalvos $cadastrarValoresSalvos)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO valores (id, idCliente, valorTotal) values (null,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarValoresSalvos->getIdCliente());
            $stmt->bindValue(2, $cadastrarValoresSalvos->getValorTotal());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarValoresSalvos($id)
    {
        try {
            $valor_salvo = new ClassClientes();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, idCliente, valorTotal FROM valores WHERE id = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $valorSalvoAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $valor_salvo->setId($valorSalvoAssoc['id']);
            $valor_salvo->setIdCliente($valorSalvoAssoc['idCliente']);
            $valor_salvo->setValoresSalvos($valorSalvoAssoc['valorTotal']);

            return $valor_salvo;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarValoresSalvos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT v.id, c.nome, c.email, v.valorTotal FROM cliente AS c INNER JOIN valores as v ON c.id = v.idCliente;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $valores_salvos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $valores_salvos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirValorSalvo($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM valores WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
