<?php
require_once 'dao/clientedao.php';
//se está vazio na está logado, entoa requer login
if (empty($_SESSION['usuario'])){
    header("Location: loginfuncionario.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop - Lista de Vendas</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require 'btsinclude.html';
?>
<!--constroi o topo-->
</head>
<body>	
<h3>Clientes Cadastados</h3>
    <?php
    $cliente = listaClientes();
    if ($cliente != null && count($cliente) > 0) {       
        echo "<div align='center'>";
        echo "<table class='table'  style='width:80%'>";
        echo "<thead class='thead-dark'>";
        echo "<th scope='col'>CPF</th><th scope='col'>Nome</th><th scope='col'>Email</th><th scope='col'>Cidade</th>";
        echo "</thead>";
        foreach ($cliente as $detalhaCliente) {
            //formata o cpf para exibicao
            $cpfFormatado = str_pad($detalhaCliente['cpfclnt'], 11, '0', STR_PAD_LEFT);
            // primeiro ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 3, 0);
            // segundo ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 7, 0);
            // hifen
            $cpfFormatado = substr_replace($cpfFormatado, "-", 11, 0);            
            echo "<tr>";   
            echo "<thead class='thead-light'>";
            echo "<th scope='row'>" . $cpfFormatado . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['nomclnt'] . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['emlclnt'] . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['cidendclnt'] . " - " . $detalhaCliente['estendclnt']."</td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "<tr style='text-align: center; padding: 0px 0px 0px;; font-size: 25px; font-family: Impact, fantasy;'>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem clientes cadastrados!";
    }
    ?>
</body>
</html>