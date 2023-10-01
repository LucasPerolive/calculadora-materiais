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
    <link rel="stylesheet" href="css/style-trabalhos-nav.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
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
        <div class="fundo-nav">
            <nav>
                <div class="mobile-menu">
                    <div class="linha1"></div>
                    <div class="linha2"></div>
                    <div class="linha3"></div>
                </div>
                <ul class="nav-list">
                    <li>
                        <button class="botoes-paredes">
                        <a href="index.php">
                        <img src="imagens/parede-simples-com-uma-chapa-em-cada-lado.png" alt="">
                        <br>Parede simples com uma chapa de cada lado</a></button>
                    </li>
                    <li>
                        <button class="botoes-paredes">
                        <a href="parede_duas_chapas.php">
                        <img src="imagens/parede-simples-com-duas-chapas-em-cada-lado.png" alt="">
                        <br>Parade simples com duas chapas de cada lado</a></button>
                    </li>
                    <li>
                        <button class="botoes-paredes">
                        <a href="forro.php">
                        <img src="imagens/forro.png" alt="">
                        <br>Forro trevo aramado H</a></button>
                    </li>
                </ul>
            </nav>
        </div>

        <?php
            include 'Visao/ValoresSalvos/FormCadValoresParedeUmaChapa.php';
        ?>
    </main>

    <footer>
        <div class="background-footer">
            <div class="contatos-footer"><br><br></div>
        </div>
    </footer>
    <script src="js/navbar.js"></script>
    <script src="js/formulario.js"></script>
</body>
</html>