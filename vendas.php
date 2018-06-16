<?php
require 'dao/vendadao.php';

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
    $venda = listaVendas();
    if ($venda != null && count($venda) > 0) {       
        echo "<div align='center'>";
        echo "<table style='width:100%'>";
        echo "<th>Código</th><th>Valor da Venda</th><th>Status da Venda)</th><th>Data</th><th>Hora</th>";
        
        foreach ($venda as $detalhaVenda) {
            echo "<tr>";         
            echo "<td>" . $detalhaVenda['codvenda'] . "</td>";
            echo "<td>" . $detalhaVenda['valvenda'] . "</td>";
            echo "<td>" . $detalhaVenda['stsvenda'] . "</td>";
            echo "<td>" . $detalhaVenda['datvenda'] . "</td>";
            echo "<td>" . $detalhaVenda['horvenda'] . "</td>";
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