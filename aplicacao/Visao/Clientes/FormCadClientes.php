<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <title></title>
</head>
<body>	
    <form action="./Controle/ControleClientes.php?ACAO=cadastrarCliente" method="post">
        <div class="conteudo">
            <h1>Formulário de registro de clientes</h1>
            <hr>
            <div class="formulario">
                
                <div class="campos-formulario">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="campos-formulario">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="campos-formulario">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>
                
                <input type="reset" value="Limpar" id="limpar">
                <input type="submit" value="Salvar" id="salvar">
            </div>
        </div>
        </form>
</body>
</html>