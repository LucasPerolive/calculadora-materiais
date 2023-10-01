<?php
require_once 'Conexao.php';
class ClassOpcoesClientes
{

    public function OpcoesClientes(){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome FROM cliente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $opcliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $opcliente;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}