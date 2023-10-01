<?php
class ClassClientes
{
    private $id;
    private $nome;
    private $email;
    private $endereco;

    function getId()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    
    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
}
