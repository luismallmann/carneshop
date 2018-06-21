<?php
// busca informacoes no banco
require_once 'dao/pedidodao.php';
require_once 'dao/clientedao.php';
session_start();
if (isset($_SESSION) && ($_SESSION["codped"])) {
    // busca informacoes na SESSION
    $codped = $_SESSION["codped"];
    $login = $_SESSION["login"];
    $valorTotal = $_SESSION['valorTotal'];
    
    // busca cpf a partir do login
    $cpf = buscaCPF($login);
    // busca dados pessoais
    $cliente = buscaDadosPessoais($cpf);
    // busca endereço e gera string a ser exibida
    $endereco = buscaEndereco($cpf);
    $cidadeUF = $endereco['cidendclnt'] . " - " . $endereco['estendclnt'];
    $endereco = $endereco['ruaendclnt'] . ", " . $endereco["numendclnt"] . ", " . $endereco['cmpendclnt'];
    // busca telefone e gera string a ser exibida
    $telefone = buscaTelefone($cpf);
    $telefone = "(" . $telefone['dddtelclnt'] . ") " . wordwrap($telefone['numtelclnt'], 5, '-', true);
    
    // formata o cpf
    // deixa todos os cpf com 11 digitos
    $cpfFormatado = str_pad($cpf, 11, '0', STR_PAD_LEFT);
    // primeiro ponto
    $cpfFormatado = substr_replace($cpfFormatado, ".", 3, 0);
    // segundo ponto
    $cpfFormatado = substr_replace($cpfFormatado, ".", 7, 0);
    // hifen
    $cpfFormatado = substr_replace($cpfFormatado, "-", 11, 0);
} else
    header("Location: index.php");

// verifica se foi clicado no botao finalizar
if (isset($_POST)) {
    if (isset($_POST["comprar"])) {
        // grava informacoes no banco
        require_once 'dao/vendadao.php';
        $codvenda = cadastraVenda($valorTotal, $codped);
        if ($codvenda != NULL) {
            atualizaQuantidadeFinal($codvenda);
            header("Location: sucesso.php");
        }
    } else if (isset($_POST['cancelar'])) {
        header("Location: index.php");
        session_destroy();
    }
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
			<a href="index.php"> <img src="img/logo.png" alt="CarneShop"
				title="CarneShop">
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
echo "<div class='row'>";
echo "<div class='col-sm'>";
echo "<h4><br>Dados Pessoais</h4>
<header>
<p><b>CPF:</b> " . $cpfFormatado . "
<br><b>Nome:</b> " . $cliente['nomclnt'] . "
<br><b>Endereço de Entrega:</b> " . $endereco . "
<br><b>Cidade:</b>: " . $cidadeUF . "
<br><b>Telefone:</b> " . $telefone . "
</p></header>";
echo "</div>";

echo "<div class='col-sm'>";
echo "<h4><br>Dados do Pedido</h4>";
echo "<table style='width:80%'>";
echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
echo "<th>Pedido Nº</th><th>Valor Total(R$)</th>";
echo "<tr style='text-align: center; padding: 0px 0px 0px; color: #B22222; font-size: 20px; font-family: Impact, fantasy;'>";
echo "<td>" . $codped . "</td>";
echo "<td>" . $valorTotal . "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";
?>

<h4>
			<br>Forma de Pagamento
		</h4>
		<input type="radio" checked="checked" name="formaPgto"> À Vista
		(Entrega)
		<header>
			<br> <b>ATENÇÃO:</b> No momento aceitamos apenas o pagamento em
			dinheiro
		</header>
		<br>
	</div>
	<div class="row">
		<div class="col">
			<form action="" method="post" name="frmComprar">
				<p align="left">
					<a href="index.php"> <input name="cancelar" type="hidden"
						value="true">
						<button name='continuar' class='btn btn-outline-danger btn-lg'
							type='submit'>Cancelar</button></a>
				</p>
			</form>
		</div>

		<div class="col">
			<form action="" method="post" name="frmComprar">
				<p align="right">
					<input name="comprar" type="hidden" value="true">
					<button name='finalizar' class='btn btn-danger btn-lg'
						type="submit">Comprar</button>
				</p>
			</form>
		</div>
	</div>
</body>
</html>


