<?php
require 'dao/pedidodao.php';
session_start();

if (isset($_SESSION) && ($_SESSION["codped"])) {
    $codped = $_SESSION["codped"];
} else
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
			<a href="index.php"> <img
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
}
</style>

</head>
<body>
	<h1>
		<font color="#8f5227"> Carrinho de Compras </font>
	</h1>
	<div>
<?php
require 'dao/produtodao.php';
$item = listaPedido_Produto($codped);
if ($item != null && count($item) > 0) {
    $soma = 0.0;
    
    echo "<div align='center'>";
    echo "<table style='width:100%'>";
    echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
    echo "<th td colspan='2'>Nome do Produto</th><th>Quantidade</th><th>Valor por Kg(R$)</th><th>Valor Total(R$)</th>";
    
    foreach ($item as $detalhaItem) {
        
        echo "<tr>";
        // trata as informacoes do pedido
        $codprod = $detalhaItem["produtocodprod"];
        $qnt = $detalhaItem["qntped"];
        // busca as informcoes do produto
        
        $infoProduto = buscaProduto($codprod);
        $valorItem = 0.0;
        $valorItem = $infoProduto["valprod"] * $qnt;
        $soma += $valorItem;
        
        echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
        echo "<td><img src='imgproduto/" . $infoProduto["imgprod"] . "'/></td>";
        echo "<td>" . $infoProduto['nomprod'] . "</td>";
        echo "<td>" . $qnt . "</td>";
        echo "<td>" . $infoProduto["valprod"] . "</td>";
        echo "<td>" . $valorItem . "</td>";
        echo "</tr>";
    }
    echo "<tr style='text-align: center; padding: 0px 0px 0px;; font-size: 25px; font-family: Impact, fantasy;'>";
    echo "<th td colspan='4'<p style='text-align:right;'>Total</th><th>R$ " . $soma . "</th>";
    echo "</table>";
    echo "</div>";
    
    $_SESSION['valorTotal'] = $soma;
} else {
    echo "Não existem produtos cadastrados!";
}

// necessario ajustar a parte php
?>
</div>
	<div class="row">
		<div class="col">
			<p align="left">
				<a href="index.php"><button name='continuar'
						class='btn btn-outline-danger btn-lg' type='submit'>&lt Continuar
						Comprando</button></a>
			</p>
		</div>
		<div class="col">
			<p align="right">
				<a href="finalizarcompra.php">
					<button name='finalizar' class='btn btn-danger btn-lg'>Finalizar
						Compra &gt</button>
				</a>
			</p>

		</div>
	</div>
</body>
</html>

