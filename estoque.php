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
            echo "<table  class='table' style='width:50%'>";
            echo "<thead class='thead-dark'>";
            echo "<th scope='col'>Código</th><th scope='col'>Nome do Produto</th><th scope='col'>Quantidade</th><th scope='col'>Valor por Kg(R$)</th>";
            echo "</thead>";
            foreach ($produto as $infoProduto) {
                echo "<tr>";
                echo "<thead class=\"thead-light\">";
                echo "<th scope='row'>". $infoProduto["codprod"] . "    </th>";
                echo "<th scope='row'>" . $infoProduto['nomprod'] . "</th>";
                echo "<th scope='row'>" . $infoProduto['estprod'] . "</th>";
                echo "<th scope='row'>" . $infoProduto["valprod"] . "</th>";
                echo "</thead>";
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