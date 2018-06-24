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
require_once 'dao/relatoriodao.php';
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
        case '3':
            rel3();
            break;
        case '4':
            rel4();
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
            echo "<th scope='col'>" . $cpfFormatado . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['nomclnt'] . "</td>";
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
            echo "<th scope='col'>" . $cpfFormatado . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['nomclnt'] . "</td>";
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

function rel3()
{
    $registros = relatorio3();
    $anterior = 0;
    if ($registros != null && count($registros) > 0) {
        echo "<h5>Código, quantidade e valor total, agrupadas por mês de vendas realizadas
 em meses pares de 2017. Relacionar da venda com maior valor para a venda com menor valor.</h5>";
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>Código</th>
        <th scope='col'>Qnt de Produtos</th>
        <th scope='col'>Valor Total (R$)</th>
        </tr>
        </thead>";
        
        foreach ($registros as $detalhaRegistro) {
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            
            if ($anterior == 0) {
                echo "<tr>";
                if ($detalhaRegistro['date_part'] == '2')
                    echo "<th class='bg-info' colspan='3'>Fevereiro</td>";
                else if ($detalhaRegistro['date_part'] == '4')
                    echo "<th class='bg-info' colspan='3'>Abril</td>";
                else if ($detalhaRegistro['date_part'] == '6')
                    echo "<th class='bg-info' colspan='3'>Junho</td>";
                else if ($detalhaRegistro['date_part'] == '8')
                    echo "<th class='bg-info' colspan='3'>Agosto</td>";
                else if ($detalhaRegistro['date_part'] == '10')
                    echo "<th class='bg-info' colspan='3'>Outubro</td>";
                else if ($detalhaRegistro['date_part'] == '12')
                    echo "<th class='bg-info' colspan='3'>Dezembro</td>";
                echo "<tr>";
            } else if ($anterior != $detalhaRegistro['date_part']) {
                echo "<tr>";
                if ($detalhaRegistro['date_part'] == '2')
                    echo "<th class='bg-info' colspan='3'>Fevereiro</td>";
                else if ($detalhaRegistro['date_part'] == '4')
                    echo "<th class='bg-info' colspan='3'>Abril</td>";
                else if ($detalhaRegistro['date_part'] == '6')
                    echo "<th class='bg-info' colspan='3'>Junho</td>";
                else if ($detalhaRegistro['date_part'] == '8')
                    echo "<th class='bg-info' colspan='3'>Agosto</td>";
                else if ($detalhaRegistro['date_part'] == '10')
                    echo "<th class='bg-info' colspan='3'>Outubro</td>";
                else if ($detalhaRegistro['date_part'] == '12')
                    echo "<th class='bg-info' colspan='3'>Dezembro</td>";
                echo "</tr>";
            }
            $anterior = $detalhaRegistro['date_part'];
            echo "<tr>";
            echo "<th scope='co'>" . $detalhaRegistro['codvenda'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['count'] . "</td>";
            echo "<th scope='col'>" . $detalhaRegistro['valvenda'] . "</td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem registros";
    }
}

function rel4()
{
    $registros = relatorio4();
    if ($registros != null && count($registros) > 0) {
        echo "<h5>Código e nome do produto, data e valor total da última venda realizada. Ordenar o 
relatório em ordem alfabética.</h5>";
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>Código</th>
        <th scope='col'>Produto</th>
        </tr>
        </thead>";
        foreach ($registros as $detalhaRegistro) {
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='row'>" . $detalhaRegistro['codprod'] . "</td>";
            echo "<th scope='row'>" . $detalhaRegistro['nomprod'] . "</td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "<tr class='bg-info'>";
        echo "<th scope='col'> Data da Compra: </td>";
        echo "<th scope='col'>" . date('d/m/Y',strtotime($detalhaRegistro['datvenda'])) . "</td>";
        echo "</tr>";
        echo "<tr class='bg-success'>";
        echo "<th scope='col'> Valor Total (R$): </td>";
        echo "<th scope='col'>" . $detalhaRegistro['valvenda'] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem registros";
    }
}
?>