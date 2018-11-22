<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop - Log de Vendas</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require_once 'btsinclude.html';
?>
<script>
function closeJanela() {	
	  		window.close();
	}
	</script>
<!-- oculta a scrollbar horizontal -->
<style>
body {
	overflow-x: hidden;
}
</style>
</head>
<body>
	<div>
	 <?php
require_once 'dao/logdao.php';
if (isset($_GET) && isset($_GET['rel'])) {
    $opcao = $_GET['rel'];
    // busca a opcao envia pelo por get e abre a respectiva funcao que exibe o relatorio
    switch ($opcao) {
        case '1':
            rel1();
            break;
        case '2':
            rel2();
            break;
        default:
            echo 'não existem registros';
    }
}
?>	
	</div>
	<div class="row">
		<div class="col">
			<p align="center">
				<button class='btn btn-outline-dark btn-lg' onclick="closeJanela();">Fechar</button>
			</p>
		</div>

</body>
</html>
<?php

function rel1()
{
    $registros = produto_log();
    if ($registros != null && count($registros) > 0) {
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>Cod. Produto</th>
        <th scope='col'>Nome Produto</th>
        <th scope='col'>Valor anterior</th>
        <th scope='col'>Valor atual</th>
        <th scope='col'>Cod. Funcionario</th>
        <th scope='col'>Data alteração</th>
        </tr>
        </thead>";
        foreach ($registros as $detalhaRegistro) {
            
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='col'>" . $detalhaRegistro['codprod'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['nomprod'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['valprodalt'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['valprod'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['codfun'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['dataalt'] . "</td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem registros";
    }
}

function rel2()
{
    $registros = venda_log();
    if ($registros != null && count($registros) > 0) {
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>Cod. Venda</th>
        <th scope='col'>Status Anterior</th>
        <th scope='col'>Status Atual</th>
        <th scope='col'>Cod. Funcionario</th>
        <th scope='col'>Data alteração</th>
        </tr>
        </thead>";
        foreach ($registros as $detalhaRegistro) {
            
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='col'>" . $detalhaRegistro['codvenda'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['stsant'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['stsnov'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['codfun'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['dataalt'] . "</td>";
            echo "</thead>";
            echo "</tr>";
            echo "<tr>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem registros";
    }
}

?>