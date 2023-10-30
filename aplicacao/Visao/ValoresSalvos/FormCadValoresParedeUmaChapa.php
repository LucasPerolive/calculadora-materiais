<!DOCTYPE html>
<?php
$msg = @$_GET['MSG'];
if ($msg != null || $msg != '') {
    echo "<script>alert('$msg')</script>";
}
echo "</div>";
?>

<?php
$tipo_chapa = @$_GET['tipo_chapa'];
$medida1 = @$_GET['medida1'];
$medida2 = @$_GET['medida2'];
$valor_chapa = @$_POST['valor_chapa'];
$valor_massa = @$_POST['valor_massa'];
$valor_montante = @$_POST['valor_montante'];
$valor_guias = @$_POST['valor_guias'];
$valor_la = @$_POST['valor_la'];
$valor_fita = @$_POST['valor_fita'];
$valor_parafuso = @$_POST['valor_parafuso'];

$valorTotal = @$_POST['valorTotal'];

require './Modelo/ClassCalculos.php';
$calculadora = new Calculadora;

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
                        <label for='medida1'>Pé direito:</label>
                        <input type='number' id='medida1' name='medida1' required>
                    </div>
                    <div class='campos-formulario'>
                        <label for='medida2'>Largura:</label>
                        <input type='number' id='medida2' name='medida2' required>
                    </div>
                    <div class='campos-formulario'>
                        <label for='tipo_chapa'>Tipo de chapa:</label>
                        <select id='tipo_chapa' name='tipo_chapa' required>
                            <option value=''>Tipos de Chapa</option>
                            <option value='RU'>Chapa RU</option>
                            <option value='ST'>Chapa ST</option>
                            <option value='RF'>Chapa RF</option>
                        </select>
                    </div>
                    <input type="submit" value="Calcular" id="calcular">
                </div>
            </div>
        </form>

        <div class="conteudo">
            <h1>Parede simples com uma chapa de cada lado</h1>
            <?php
                switch ($tipo_chapa){
                    case "RU":
                        echo "<p>Chapa RU BR 12,5mm em cada face</p>
                        <p>Quantitativo estimado - Parede simples com uma chapa de cada lado</p>";
                        break;
                    case "ST":
                        echo "<p>Chapa ST BR 12,5mm em cada face</p>
                        <p>Quantitativo estimado - Parede simples com uma chapa de cada lado</p>";
                        break;
                    case "RF":
                        echo "<p>Chapa RF 12,5mm em cada face</p>
                        <p>Quantitativo estimado - Parede simples com uma chapa de cada lado</p>";
                        break;
                }
            ?>
            
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
                            <tr>
                            <?php
                                $area_parede = $medida1 * $medida2;
                                $quantidade_chapas = $calculadora->QuantidadeChapasParede($area_parede);
                                $valor_chapa = ($quantidade_chapas * (float)$valor_chapa);
                                switch ($tipo_chapa){
                                    case "RU":
                                        echo "<td><p>Chapa RU BR 1,80 x 1,20 - 12,5mm de espessura</p></td>";
                                        break;
                                    case "ST":
                                        echo "<td><p>Chapa ST BR 1,80 x 1,20 - 12,5mm de espessura</p></td>";
                                        break;
                                    case "RF":
                                        echo "<td><p>Chapa RF 1,80 x 1,20 - 12,5mm de espessura</p></td>";
                                        break;
                                    default:
                                        echo "<td><p>Chapa 1,80 x 1,20 - 12,5mm de espessura</p></td>";
                                } 
                                echo "<td>" . $quantidade_chapas . "</td>
                                <td><input type='number' name='valor_chapa'></td>
                                <td><p>R$" . $valor_chapa .  "</p></td>
                                </tr>";

                                $quantidade_massa = $calculadora->QuantidadeMassaParede($area_parede);
                                $valor_massa = ($quantidade_massa * (float)$valor_massa);
                                echo "
                                <tr>
                                <td><p>Massa KG</p></td>
                                <td>" . $quantidade_massa . "</td>
                                <td><input type='number' name='valor_massa'></td>
                                <td><p>R$" . $valor_massa .  "</p></td>
                                </tr>";

                                $quantidade_montantes = $calculadora->QuantidadeMontantes($medida2);
                                $valor_montante = ($quantidade_montantes * (float)$valor_montante);
                                echo "
                                <tr>
                                <td><p>Montates</p></td>";
                                if ($medida1 == null) {
                                    echo "<td>0</td>"; 
                                } else {
                                    echo "<td>" .  $quantidade_montantes . "</td>";
                                }
                                echo "<td><input type='number' name='valor_montantes'></td>
                                <td><p>R$" . $valor_montante .  "</p></td>
                                </tr>";

                                $quantidade_guias = $calculadora->QuantidadeMontantes($medida2);
                                $valor_guias = ($quantidade_guias * (float)$valor_guias);
                                echo "
                                <tr>
                                <td><p>Guias</p></td>
                                <td>" .  $quantidade_guias . "</td>
                                <td><input type='number' name='valor_guias'></td>
                                <td><p>R$" . $valor_guias .  "</p></td>
                                </tr>";

                                $valor_la = (ceil($area_parede) * (float)$valor_la);
                                echo "
                                <tr>
                                <td><p>Lã para isolamento termoacústico</p></td>
                                <td>" . ceil($area_parede) . "</td>
                                <td><input type='number' name='valor_la'></td>
                                <td><p>R$" . $valor_la .  "</p></td>
                                </tr>";

                                $quantidade_fita = $calculadora->QuantidadeFitaParede($area_parede);
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
                                <td><p>Parafusos 25mm</p></td>
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
                                    $valorTotal = $valor_chapa + $valor_fita + $valor_massa + $valor_parafuso + $valor_la + $valor_montante + $valor_guias;
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