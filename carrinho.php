<?php
require 'dao/pedidodao.php';
session_start();

if (isset($_SESSION) && ($_SESSION["codped"]) && ($_SESSION["qntdped"])) {
    $codped = $_SESSION["codped"];
    $qntped = $_SESSION["qntdped"];
 
}
else 
    echo "erro";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require 'btsinclude.html';
?>
<!--constroi o topo-->
<div id="box-topo" class="container-1230"
	style="background-color: #8f5227";>
	<div class="row">
		<div class="col">
			<a href="http://localhost/carneshop/lista_produtos.php"> <img
				src="img/logo.png" alt="CarneShop" title="CarneShop">
			</a>
		</div>
		<div class="col-md-auto"></div>
		<div class="col">
			<img src="img/carne.png" alt="CarneShop" title="CarneShop"> </a>
		</div>
	</div>
</div>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
</style>

</head>
<body>
<h1><font color="#8f5227"> Carrinho de Compras </font></h1>
<div>
<?php
	    $item = listaProdutos($codpes);
        if ($item != null && count($item) > 0) {
        	echo "<div align='center'>";
            echo "<table style='width:100%'>";
            echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
            echo "<th td colspan='2'>Nome do Produto</th><th>Quantidade</th><th>Valor por Kg(R$)</th><th>Valor Total(R$)</th>";
            echo"<tr>";
            foreach ($item as $produto) {
                //aqui deve ser buscado os item confome codprod e quantidade armazenados no banco

                echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
	                echo "<td><img src='imgproduto/" . $produto["imgprod"]."'/></td>";
                	echo "<td>". $produto['nomprod']."</td>";
                	echo "<td>". $produto["desprod"] . "</td>";
                   	echo "<td>".$produto["valprod"]."</td>";
                   	echo "<td>".$produto["valprod"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        else {
            echo "Não existem produtos cadastrados!";
        }
        
        
        //necessario ajustar a parte php
        ?>





</div>


	<div class="row">
		<div class="col">
			<p align="left">
				<a href="lista_produtos.php"><button name='continuar'
						class='btn btn-outline-danger btn-lg' type='submit'>&lt Continuar
						Comprando</button></a>
			</p>
		</div>
		<div class="col">
			<form action='' method='post' name='frmAdicionar' class="form">
				<p align="right">
					<a href="#">
						<button name='finalizar' class='btn btn-danger btn-lg'
							type='submit'>Finalizar Compra &gt></button>
					</a>
				</p>
			</form>
		</div>
	</div>



</body>
</html>

