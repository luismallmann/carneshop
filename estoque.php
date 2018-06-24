<?php

require_once 'dao/produtodao.php';

if (isset($_POST) && isset($_POST["produtoX"])) {
    $produtoX = $_POST["produtoX"];
    
    header("Location: loginusuario.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require_once 'btsinclude.html';
?>
<!--constroi o topo-->
</head>
<body>	
    <?php
	    $produto = lista();
        if ($produto != null && count($produto) > 0) {
                
            echo "<div align='center'>";
            echo "<table style='width:50%'>";
            echo "<th>Código</th><th>Nome do Produto</th><th>Quantidade</th><th>Valor por Kg(R$)</th>";
            foreach ($produto as $infoProduto) {
                echo "<tr>";
                echo "<td>". $infoProduto["codprod"] . "    </td>";
                echo "<td>" . $infoProduto['nomprod'] . "</td>";
                echo "<td>" . $infoProduto['estprod'] . "</td>";
                echo "<td>" . $infoProduto["valprod"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        else {
            echo "Não existem produtos cadastrados!";
        }
        ?>
</body>
</html>