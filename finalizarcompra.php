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
}
</style>

</head>
<body>
	<h1>
		<font color="#8f5227"> Finalizar Compra </font>
	</h1>
	<div>
<?php
$valorTotal = $_SESSION['valorTotal'];
$codped=$_SESSION['codped'];
echo "<div class='row'>";
echo "<div class='col-sm'>";
echo "<h4><br>Dados Pessoais</h4>
<header>
<p><b>CPF:</b>
<br><b>Nome:</b>
<br><b>Endereço:</b>
<br><b>Cidade:</b>:
<br><b>Telefone:</b> 
</p></header>";
echo "</div>";

echo "<div class='col-sm'>";
echo "<h4><br>Dados do Pedido</h4>";
echo "<table style='width:80%'>";
echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
echo "<th>Pedido Nº</th><th>Valor Total(R$)</th>";
echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
echo "<td>".$codped."</td>";
echo "<td>" . $valorTotal . "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
?>

<h4><br>Forma de Pagamento</h4>
<input type="radio" checked="checked" name="formaPgto"> À Vista (Entrega)
<header><br>ATENÇÃO: No momento aceitamos apenas o pagamento em dinheiro na entrega do produto</header>
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
			<p align="right">
				<a href="finalizarcompra.php">
					<button name='finalizar' class='btn btn-danger btn-lg'>Finalizar
						Compra &gt></button>
				</a>
			</p>

		</div>
	</div>
</body>
</html>


