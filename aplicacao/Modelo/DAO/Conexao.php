<?php

abstract class Conexao {

    public static function getInstance() {
        $dsn = 'mysql:host=localhost;dbname=calculadora_materiais';
        $user = 'aplicacao';
        $pass = '123';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
