<script language="javaScript" type="text/javascript">
function checkDelete(){
    return confirm('Deseja continuar?');
}
</script>

<?php
    require './Modelo/ClassClientes.php';
    require './Modelo/DAO/ClassClientesDAO.php';

    $classClientesDAO = new ClassClientesDAO();
    $us = $classClientesDAO->listarClientes();

    echo "<div class='conteudo'>";
    echo "<h1>Lista de clientes</h1>";
    echo "<div class='tabela'>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "      <th><h4>Clientes</h4></th> ";
    echo "      <th><h4>E-mail</h4></th> ";
    echo "      <th><h4>Endereço</h4></th> ";
    echo "      <th><h4>Excluir</h4></th> ";
    echo " </tr>";
    echo "</thead>";

    echo "<tbody>"; 

    foreach ($us as $us) {

        echo "<tr>";
        echo "<td><p>". $us['nome'] . "</p></td>";
        echo "<td><p>" . $us['email'] . "</p></td>";
        echo "<td><p>" . $us['endereco'] . "</p></td>";
        echo "<td><a href='Controle/ControleClientes.php?ACAO=excluirCliente&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";


