<?php
require_once 'dao/vendadao.php';
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
<!-- script popup -->
<script lang=javascript type="text/javascript">
function gerenciarVenda(url){
	varWindow = window.open (url, 0, 'toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=850,height=800')
}
</script>
<!--constroi o topo-->
</head>
<body>	
<h3>Relatório de Vendas</h3>
<div>  
    <?php
    $venda = listaVendas();
    if ($venda != null && count($venda) > 0) {
        
        echo "<div align='center'>";
        echo "<table class='table' style='width:100%'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
        <th scope='col'>Código</th>
        <th scope='col'>Valor da Venda</th>
        <th scope='col'>Status da Venda</th>
        <th scope='col'>Data</th>
        <th scope='col'>Hora</th>
        </tr>
        </thead>";
        echo "<tbody>";
        foreach ($venda as $detalhaVenda) {
            $params = '?' . http_build_query(array(
                'codvenda' => $detalhaVenda['codvenda']));
            
            $url = 'gerenciarvenda.php'.$params;
            echo "<tr>";
            echo "<thead class=\"thead-light\">";
            echo "<th scope='row'><button class='btn btn-dark btn-lg' onclick=\"gerenciarVenda('$url')\">".$detalhaVenda['codvenda']."</button></th>";
            echo "<th scope='row'>" . $detalhaVenda['valvenda'] . "</th>";
            echo "<th scope='row'>" . $detalhaVenda['stsvenda'] . "</th>";
            echo "<th scope='row'>" . date("d/m/Y",strtotime($detalhaVenda['datvenda'])) . "</th>";
            echo "<th scope='row'>" . date("H:i:s",strtotime($detalhaVenda['horvenda'])) . "</th>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "<tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem produtos cadastrados!";
    }
    ?>
    </div>

</body>
</html>