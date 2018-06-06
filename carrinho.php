<?php
require 'dao/produtodao.php';

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
</head>
<body>
<h1><font color="#8f5227"> Carrinho de Compras </font></h1>


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

