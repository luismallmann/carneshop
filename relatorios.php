<?php
//se está vazio na está logado, entoa requer login
if (empty($_SESSION['usuario'])){
    header("Location: loginfuncionario.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop - Relatório de Vendas</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require_once 'btsinclude.html';
?>
<style>
.center-div
{
     margin: 0 auto;
     width: 100px; 
}
</style>
<script language=javascript type="text/javascript">
function gerenciarVenda(url){
	varWindow = window.open (url, 0, 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=500')
}
</script>
</head>
<body>
	<h3>Relatórios</h3>
<div class="center-div" style='width:80%' align="center">
	
		<button type="submit" class="btn btn-secondary btn-sm btn-block" name="relatorio1" onclick="gerenciarVenda('exiberelatorio.php?rel=1')">1 - Relacionar o código e nome de 
			clientes do sexo feminino <br>com idades entre 20 e 30 anos da cidade de Itapiranga - SC. Ordenar o relatório em ordem 
			alfabética</button>
		<button type="submit" class="btn btn-secondary btn-sm btn-block" name="relatorio2" onclick="gerenciarVenda('exiberelatorio.php?rel=2')">2 - Relacionar o código e nome de 
		clientes com mais de 2 telefones cadastrados</button>
		<button type="submit" class="btn btn-secondary btn-sm btn-block" name="relatorio3" onclick="gerenciarVenda('exiberelatorio.php?rel=3')">3 - Relacionar código, quantidade 
		e valor total, agrupadas por mês de vendas realizadas em meses<br> pares de 2017. Relacionar da venda com maior valor para a venda com
		 menor valor</button>
		 <button type="submit" class="btn btn-secondary btn-sm btn-block" name="relatorio4" onclick="gerenciarVenda('exiberelatorio.php?rel=4')">4 - Relacionar o código e nome do 
		 produto, data e valor total da última venda realizada. Ordenar o relatório<br> em ordem alfabética</button>
	</div>
</body>
</html>