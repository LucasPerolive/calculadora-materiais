<!DOCTYPE html>
<?php
$msg = @$_GET['MSG'];
if ($msg != null || $msg != '') {
    echo "<script>alert('$msg')</script>";
}
echo "</div>";
?>

<?php
$opcao_parede = @$_GET['opcao-parede'];

$area_forro = @$_GET['area_forro'];
$valor_chapa = @$_POST['valor_chapa'];
$valor_massa = @$_POST['valor_massa'];
$valor_fita = @$_POST['valor_fita'];
$valor_parafuso = @$_POST['valor_parafuso'];

$valorTotal = @$_POST['valorTotal'];

require './Modelo/ClassCalculos.php';
$calculadora = new Calculadora;

require './Modelo/ClassValoresSalvos.php';
require './Modelo/DAO/ClassValoresSalvosDAO.php';
$classClassValoresSalvosDAO = new ClassValoresSalvosDAO();


require './Modelo/DAO/ClassOpcoesClientes.php';
$classClientesDAO = new ClassOpcoesClientes();
$oc = $classClientesDAO->OpcoesClientes();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <title></title>
    </head>
    <body>
        <form action="" method="get" onsubmit="return validarMedida(document.getElementById('medida1').value) && validarMedida(document.getElementById('medida2').value)">
            <div class="conteudo">
                <h1>Formulário para cálculo</h1>
                <hr>
                <div class='formulario'>
                    <div class='campos-formulario'>
                        <label for='area_forro'>Área calculada:</label>
                        <input type='number' id='medida1' name='area_forro' required>
                    </div>
                    <input type="submit" value="Calcular" id="calcular">
                    <br>
                </div>
            </div>
        </form>

        <div class="conteudo">
            <h1>Forro trevo aramado H</h1>
            <p>1 chapa ST BR 1,80 x 1,20 - 12,5mm de espessura</p>
            <p>Quantitativo estimado - Forro Aramado "H" - FTA</p>
            <br>
            <hr>
            <h2>Digite os preços manualmente:</h2>
            <hr>

            <div class="formulario-valores">
                <div class="tabela">
                    <form action="" method="post" onsubmit="return validarMedida(document.getElementsByName('valores').value)">
                    <table>
                        <thead>
                            <tr>
                                <th><h4>Produto</h4></th>
                                <th><h4>Quantidade</h4></th>
                                <th><h4>Preço</p></h4>
                                <th><h4>Valor</p></h4>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $quantidade_chapas = $calculadora->QuantidadeChapasForro($area_forro);
                                $valor_chapa = ($quantidade_chapas * (float)$valor_chapa);
                                echo "
                                <tr>
                                <td><p>Chapa ST BR 1,80 x 1,20 - 12,5mm de espessura</p></td>
                                <td>" . $quantidade_chapas . "</td>
                                <td><input type='number' name='valor_chapa'></td>
                                <td><p>R$" . $valor_chapa .  "</p></td>
                                </tr>";

                                $quantidade_massa = $calculadora->QuantidadeMassaForro($area_forro);
                                $valor_massa = ($quantidade_massa * (float)$valor_massa);
                                echo "
                                <tr>
                                <td><p>Saco de massa 5kg</p></td>
                                <td>" . $quantidade_massa . "</td>
                                <td><input type='number' name='valor_massa'></td>
                                <td><p>R$" . $valor_massa .  "</p></td>
                                </tr>";

                                $quantidade_fita = $calculadora->QuantidadeFitaForro($area_forro);
                                $valor_fita = ($quantidade_fita * (float)$valor_fita);
                                echo "
                                <tr>
                                <td><p>Fita Telada 150M</p></td>
                                <td>" . $quantidade_fita . "</td>
                                <td><input type='number' name='valor_fita'></td>
                                <td><p>R$" . $valor_fita .  "</p></td>
                                </tr>";

                                $quantidade_parafuso = $calculadora->QuantidadeParafuso($quantidade_chapas);
                                $valor_parafuso = ($quantidade_parafuso * (float)$valor_parafuso);
                                echo "
                                <tr>
                                <td><p>Pacote de parafusos 10 unidades</p></td>
                                <td>" . $quantidade_parafuso . "</td>
                                <td><input type='number' name='valor_parafuso'></td>
                                <td><p>R$" . $valor_parafuso .  "</p></td>
                                </tr>";
                            ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="2" id="foot-tabela"><h4>Valor Total</h4></th>
                                <th id="foot-tabela"><h4>Opções</h4></th>
                                <th id="foot-tabela"></th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <?php
                                    $valorTotal = $valor_chapa + $valor_fita + $valor_massa + $valor_parafuso;
                                    if ($valorTotal == null){
                                        $valorTotal = 0;
                                    }
                                    echo "<h1>O valor total é de R$ $valorTotal</h1>";
                                    ?>
                                </td>
                                <td colspan="2">
                                    <input type="submit" name="acao" value="Total" id="calcular">
                                    <input type="reset" name="acao" value="Limpar" id="limpar">
                                </td>
                            </tr>
                    </form>
                    <form action="./Controle/ControleValoresSalvos.php?ACAO=cadastrarValor" method="post">
                            <tr>
                                <td></td>
                                <td><input type="hidden" name="valorTotal" value="<?php echo $valorTotal; ?>"></td>
                                <td>
                                    <select id="clientes" name="idCliente" required>
                                        <option>Clientes</option>
                                        <?php
                                        foreach($oc as $cliente){
                                            echo "<option value='" . $cliente['id'] . "'> " . $cliente['nome'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="submit" name="acao" value="Salvar" id="salvar"></td>
                            </tr>
                    </form>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </body>
</html>