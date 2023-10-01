<?php
require_once 'Conexao.php';
class ClassClientesDAO
{
    public function cadastrar(ClassClientes $cadastrarCliente)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO cliente (id, nome, email, endereco) values (null,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarCliente->getNome());
            $stmt->bindValue(2, $cadastrarCliente->getEmail());
            $stmt->bindValue(3, $cadastrarCliente->getEndereco());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarCliente($id)
    {
        try {
            $cliente = new ClassClientes();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, email, endereco, FROM cliente WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $clienteAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $cliente->setId($clienteAssoc['id']);
            $cliente->setNome($clienteAssoc['nome']);
            $cliente->setEmail($clienteAssoc['email']);
            $cliente->setEndereco($clienteAssoc['endereco']);

            return $cliente;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    public function listarClientes()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM cliente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluirClientes($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM cliente WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
