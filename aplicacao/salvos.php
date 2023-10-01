<!DOCTYPE html>
<?php
$msg = @$_GET['MSG'];
if ($msg != null || $msg != '') {
    echo "<script>alert('$msg')</script>";
}

    require './Modelo/ClassValoresSalvos.php';
    require './Modelo/DAO/ClassValoresSalvosDAO.php';

    $classValoresSalvosDAO = new ClassValoresSalvosDAO();
    $us = $classValoresSalvosDAO->listarValoresSalvos();
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-trabalhos-nav.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Salvos</title>
</head>
<body>
    <div class="background">
        <header>
            <div class="logo">            
                <a href="index.php"><i class="fa-solid fa-c"></i></a>           
            </div>
            <div class="cabecalho-link">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="clientes.php">Cadastro</a>
                </li>
                <li>
                    <a href="salvos.php">Salvos</a>
                </li>
            </div>
        </header>
    </div>

    <main>

        <div class="conteudo">
            <h1>Lista de valores salvos</h1>
            <div class="tabela">
                <table>
                    <thead>
                        <tr>
                            <th><h4>Clientes</h4></th>
                            <th><h4>E-mail</h4></th>
                            <th><h4>Valor do projeto</p></h4>
                            <th><h4>Excluir</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($us as $us) {

                                echo "<tr>";
                                echo "<td><p>". $us['nome'] . "</p></td>";
                                echo "<td><p>" . $us['email'] . "</p></td>";
                                echo "<td><p>R$" . $us['valorTotal'] . "</p></td>";
                                echo "<td><a href='Controle/ControleValoresSalvos.php?ACAO=excluirValor&idex=".$us["id"]."' onclick='return checkDelete()'><input type='button' name='excluir' id='excluir' value='excluir' class='btn btn-danger'></a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <div class="background-footer">
            <div class="contatos-footer"><br><br></div>
        </div>
    </footer>
</body>
</html>