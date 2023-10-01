<!DOCTYPE html>
<?php
$msg = @$_GET['MSG'];
if ($msg != null || $msg != '') {
    echo "<script>alert('$msg')</script>";
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/style-trabalhos-nav.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Trabalhos</title>
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
        <?php
            include 'Visao/Clientes/FormCadClientes.php';
            include 'Visao/Clientes/ListarClientes.php';
        ?>
    </main>

    <footer>
        <div class="background-footer">
            <div class="contatos-footer"><br><br></div>
        </div>
    </footer>
    <script src="js/formulario.js"></script>
</body>
</html>