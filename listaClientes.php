<?php
require_once 'dao/clientedao.php';

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
<h3>Relatório de Vendas</h3>
    <?php
    $cliente = listaClientes();
    if ($cliente != null && count($cliente) > 0) {       
        echo "<div align='center'>";
        echo "<table style='width:100%'>";
        echo "<th>CPF</th><th>Nome</th><th>Sexo)</th><th>Email</th><th>Hora</th>";
        
        foreach ($cliente as $detalhaCliente) {
            echo "<tr>";         
            echo "<td>" . $$detalhaCliente['cpfclnt'] . "</td>";
            echo "<td>" . $$detalhaCliente['nomclnt'] . "</td>";
            echo "<td>" . $$detalhaCliente['sexclnt'] . "</td>";
            echo "<td>" . $$detalhaCliente['emlclnt'] . "</td>";
            echo "<td>" . $$detalhaCliente['nomclnt'] . "</td>";
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