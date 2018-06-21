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
        echo "<table style='width:80%'>";
        echo "<th>CPF</th><th>Nome</th><th>Email</th><th>Cidade</th>";
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
            echo "<td>" . $cpfFormatado . "</td>";
            echo "<td>" . $detalhaCliente['nomclnt'] . "</td>";
            echo "<td>" . $detalhaCliente['emlclnt'] . "</td>";
            echo "<td>" . $detalhaCliente['cidendclnt'] . " - " . $detalhaCliente['estendclnt']."</td>";
            echo "</tr>";
        }
        echo "<tr style='text-align: center; padding: 0px 0px 0px;; font-size: 25px; font-family: Impact, fantasy;'>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem produtos cadastrados!";
    }
    ?>
</body>
</html>