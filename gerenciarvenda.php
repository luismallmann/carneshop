<?php
// busca informacoes no banco
require_once 'dao/vendadao.php';
require_once 'dao/pedidodao.php';
require_once 'dao/clientedao.php';
require_once 'dao/produtodao.php';

if (isset($_GET) && ($_GET["codvenda"])) {
    $codvenda = $_GET["codvenda"];
    
    $venda = buscaVenda($codvenda);
    $codped = $venda['codped'];
    $cpf = $venda['clientecpfclnt'];
    
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
    echo "erro";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop</title>
<script>
function closeJanela() {
		alert("O status da Venda NÃO foi alterado!");
		
	  		window.close();
	}
function fecharAlteracao(){
	alert("O status da Venda foi alterado!");
	
  		window.close();

  		window.opener.location.reload();	
}
</script>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require 'btsinclude.html';
?>
</head>
<body>
	<h1>
		<font color="#8f5227"><b>Gerenciamento da Venda</b></font>
	</h1>
	<div class='row'>
		<div class='col-sm'>
			<h4>
				<br> <b>Dados do Cliente</b>
			</h4>
			<header>
<?php
echo "<p><b>CPF:</b> " . $cpfFormatado . "
<br><b>Nome:</b> " . $cliente['nomclnt'] . "
<br><b>Endereço de Entrega:</b> " . $endereco . "
<br><b>Cidade:</b>: " . $cidadeUF . "
<br><b>Telefone:</b> " . $telefone . "
</p></header>";
echo "</div>";

echo "<div class='col-sm'>
<h4>
<br><b>Dados da Venda</b>
</h4>";

echo "<form action=\"\" method=\"post\" id=\"status\"></form>";

echo "<p>				<b>Código:</b> " . $codvenda . "<br>
						<b>Valor da Venda(R$): </b>" . $venda['valvenda'] . "<br>
						<b>Data: </b>" . date("d/m/Y",strtotime($venda['datvenda'])) . "<br>
						<b>Hora: </b>" . date("H:i:s",strtotime($venda['horvenda'])) . "<br>
						<b>Status:</b> <select class=\"form-control-sm\" name=\"atualiza\" form=\"status\">
                            <option>" . $venda['stsvenda'] . "</option>
							<option>EM SEPARAÇÃO</option>    
							<option>SAIU PARA ENTREGA</option>
							<option>EM TRANSPORTE</option>
							<option>CANCELADO</option>
                            <option>ENTREGUE</option>
						</select>

</p></header>";
echo "</div>";
echo "</div>";

$pedido = listaPedido_Produto($codped);
$soma = 0.0;

echo "<div class ='row'>  
<div class='col-sm'>
<h4><b><br>Itens</b></h4> 
<table style='width:80%'>
<th>Cod Produto</th><th>Nome do Produto</th><th>Quantidade</th><th>Valor por Kg(R$)</th><th>Valor Total(R$)</th>";

foreach ($pedido as $detalhaItem) {
    
    echo "<tr>";
    // trata as informacoes do pedido
    $codprod = $detalhaItem["produtocodprod"];
    $qnt = $detalhaItem["qntped"];
    // busca as informcoes do produto
    
    $infoProduto = buscaProduto($codprod);
    $valorItem = 0.0;
    $valorItem = $infoProduto["valprod"] * $qnt;
    $soma += $valorItem;
    
    echo "<td>" . $infoProduto["codprod"] . "</td>";
    echo "<td>" . $infoProduto['nomprod'] . "</td>";
    echo "<td>" . $qnt . "</td>";
    echo "<td>" . $infoProduto["valprod"] . "</td>";
    echo "<td>" . $valorItem . "</td>";
    echo "</tr>";
}
echo "<th td colspan='4'<p style='text-align:right;'>Total</th><th>R$ " . $soma . "</th>";
echo "</table>";
echo "</div>";
echo "</div>";
?>
		<div class="row">
					<div class="col">
						<p align="left">
							<button class='btn btn-outline-danger btn-lg'
								onclick="closeJanela();">Fechar</button>
						</p>
					</div>

					<div class="col">
							<p align="right">
								<button name="btnAtualizar" class="btn btn-primary"  type="submit"  form="status">Atualizar</button>
							</p>
					</div>
				</div>

</body>
</html>
<?php 
if (isset($_POST) && isset($_POST['atualiza'])) {
    $statusNovo = $_POST['atualiza'];
        //atualiza o status do produto
        if(alteraStatus($codvenda, $statusNovo)==TRUE)
            echo "<script>fecharAlteracao();</script>";
}
?>


