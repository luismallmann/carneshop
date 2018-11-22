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
<title>CarneShop - Log(Venda - Produto)</title>
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
<script lang=javascript type="text/javascript">
function gerenciarVenda(url){
	varWindow = window.open (url, 0, 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=500')
}
</script>
</head>
<body>
	<h3>Relatórios</h3>
<div class="center-div" style='width:80%' align="center">
	
		<button type="submit" class="btn btn-secondary btn-sm btn-block" name="log1" onclick="gerenciarVenda('exibelogs.php?rel=1')">1 - Traz hitórico de alteração do valor dos produtos.</button>
		<button type="submit" class="btn btn-secondary btn-sm btn-block" name="log2" onclick="gerenciarVenda('exibelogs.php?rel=2')">2 - Traz histórico de alteração do status de venda</button>
			</div>
</body>
</html>