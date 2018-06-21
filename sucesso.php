<?php
require_once 'dao/clientedao.php';
session_start();
if (isset($_SESSION) && ($_SESSION["codped"])) {
    // busca informacoes na SESSION
    $login = $_SESSION["login"];
    $codPed = $_SESSION['codped'];
    
    $cpf = buscaCPF($login);
    // busca dados pessoais
    $cliente = buscaDadosPessoais($cpf);
} else
    header("Location: index.php");

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

</head>
<body>
	<br>
	<p
		style='text-align: center; padding: 10px 0px 0px; color: #B22222; font-size: 30px; font-family: Impact, fantasy;'>
		<br>Obrigado <?php  echo " ".$cliente['nomclnt'] ?>,
<br>Compra Efetuada com Sucesso!
	</p>

	<br>
	<h5>
		<center>O pedido número<?php echo" ".$codPed?> em breve será entregue em seu endereço.</center>
	</h5>

	<div class="col">
	<br>
		<p align="center">
			<a href='index.php'>
				<button name='Tela Inicial' class='btn btn-danger btn-lg'>Tela Inicial</button>
			</a>
		</p>
	</div>
<?php 
session_destroy();
?>
</body>
</html>




