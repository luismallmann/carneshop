<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- chama o topo/cabeçalho e o bootstrap -->
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
.container {
	width: 100vw;
	height: 100vh;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

.box {
	width: 600px;
	height: 600px;
	background: #fff;
}
</style>
<title>CarneShop</title>
</head>
<body>
<?php include "cadastro_cliente_formulario.php"?>
</body>
</html>
<?php
require 'dao/clientedao.php';
if (isset($_POST) && isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["datanas"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["ddd"]) && isset($_POST["telefone"]) && isset($_POST["cidade"]) && isset($_POST["estado"]) && isset($_POST["CEP"]) && isset($_POST["rua"])   && isset($_POST["numEnd"]) && isset($_POST["bairro"])) {
     cadastraUsuario($_POST);
} 
?>
