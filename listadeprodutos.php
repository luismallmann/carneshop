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
<script lang=javascript type="text/javascript">
function gerenciarVenda(url){
	varWindow = window.open (url, "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=800")
}
</script>

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
            echo "<table border='1'>";
            foreach ($produto as $cat) {
                echo "<tr>";
	                echo "<td>";
    		            echo "<img src='imgproduto/" . $cat["imgprod"]."'/>";
            	    echo "</td>";
                	echo "<td>";
                		echo "<p style='text-align: center; padding: 10px 0px 0px; color: #B22222; font-size: 30px; font-family: Impact, fantasy;'>" . $cat['nomprod'] . "</p>";
                		
                		echo "<p style='text-align: justify; margin: 10px; color: #696969; font-size: 22px; font-family: Times, serif;'>" . $cat["desprod"] . "</p>";
                		
                		echo "<p style='text-align: justify; margin: 10px; color: #696969; font-size: 22px; font-family: Times, serif;'>Preço por kg: R$ "  . $cat["valprod"] . "</p>";
                		$url='alteraproduto.php?codprod='.$cat['codprod'];
                        echo "<button class='btn btn-danger' onclick=\"gerenciarVenda('$url')\">Alterar</button>";
                        echo "</a>";
               		echo "</td>";
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