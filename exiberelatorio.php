<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop - Relatório de Vendas</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require_once 'btsinclude.html';
?>
<script>
function closeJanela() {	
	  		window.close();
	}
	</script>
</head>
<body>
	<div>
	 <?php
require_once 'dao/relatoriodao.php';
if (isset($_GET) && isset($_GET['rel'])) {
    $opcao = $_GET['rel'];
    //busca a opcao envia pelo por get e abre a respectiva funcao que exibe o relatorio
    switch ($opcao) {
        case '1':
            rel1();
            break;
        case '2':
            rel2();
            break;
        case '3':
            break;
        case '4':
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
    $registros = relatorio1();
    if ($registros != null && count($registros) > 0) {
        echo "<h5>Código e Nome de clientes do sexo feminino com idades entre 20 e 30 anos da cidade de Itapiranga - SC.
Ordenar o relatório em ordem alfabética</h5>";
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>CPF do Cliente</th>
        <th scope='col'>Nome Cliente</th>
        </tr>
        </thead>";
        foreach ($registros as $detalhaRegistro) {
            // formata o cpf
            $cpfFormatado = str_pad($detalhaRegistro['cpfclnt'], 11, '0', STR_PAD_LEFT);
            // primeiro ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 3, 0);
            // segundo ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 7, 0);
            // hifen
            $cpfFormatado = substr_replace($cpfFormatado, "-", 11, 0);
            
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='row'>" . $cpfFormatado . "</td>";
            echo "<th scope='row'>" . $detalhaRegistro['nomclnt'] . "</td>";
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
    $registros = relatorio2();
    if ($registros != null && count($registros) > 0) {
        echo "<h5>Código e Nome de clientes com mais de 2 telefones cadastrados</h5>";
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>CPF do Cliente</th>
        <th scope='col'>Nome Cliente</th>
        </tr>
        </thead>";
        foreach ($registros as $detalhaRegistro) {
            // formata o cpf
            $cpfFormatado = str_pad($detalhaRegistro['cpfclnt'], 11, '0', STR_PAD_LEFT);
            // primeiro ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 3, 0);
            // segundo ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 7, 0);
            // hifen
            $cpfFormatado = substr_replace($cpfFormatado, "-", 11, 0);
            
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='row'>" . $cpfFormatado . "</td>";
            echo "<th scope='row'>" . $detalhaRegistro['nomclnt'] . "</td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem registros";
    }
}
?>