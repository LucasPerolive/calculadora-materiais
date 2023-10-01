<?php
class ClassValoresSalvos
{
    private $id;
    private $idCliente;
    private $valorTotal;

    function getId()
    {
        return $this->id;
    }

    function getIdCliente()
    {
        return $this->idCliente;
    }

    function getValorTotal()
    {
        return $this->valorTotal;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }
}
