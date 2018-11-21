<?php
require_once 'dao/clientedao.php';
//se está vazio na está logado, entoa requer login
if (empty($_SESSION['usuario'])){
    header("Location: loginfuncionario.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop - Lista de Vendas</title>
<!-- chama o arquivo que contem as informacoes do boot strap -->
<script lang=javascript type="text/javascript">
function gerenciarVenda(url){
	varWindow = window.open (url, 0, 'toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=850,height=800')
}
</script>
<?php
require 'btsinclude.html';
?>

<!--constroi o topo-->
</head>
<body>	
<h3>Clientes Cadastados</h3>
    <?php
    $cliente = listaClientes();
    
    if ($cliente != null && count($cliente) > 0) {       
        echo "<div align='center'>";
        echo "<table class='table'  style='width:80%'>";
        echo "<thead class='thead-dark'>";
        echo "<th scope='col'>CPF</th><th scope='col'>Nome</th><th scope='col'>Email</th><th scope='col'>Cidade</th><th scope='col'>Pedidos</th>";
        echo "</thead>";
        foreach ($cliente as $detalhaCliente) {
            //formata o cpf para exibicao
            $cpfFormatado = str_pad($detalhaCliente['cpfclnt'], 11, '0', STR_PAD_LEFT);
            // primeiro ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 3, 0);
            // segundo ponto
            $cpfFormatado = substr_replace($cpfFormatado, ".", 7, 0);
            // hifen
            $cpfFormatado = substr_replace($cpfFormatado, "-", 11, 0);       
            $params = '?' . http_build_query(array(
                'cpf' => $detalhaCliente['cpfclnt']));
            
            $url = 'pedidosCliente.php'.$params;
            echo "<tr>";   
            echo "<thead class='thead-light'>";
            echo "<th scope='row'>" . $cpfFormatado . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['nomclnt'] . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['emlclnt'] . "</td>";
            echo "<th scope='row'>" . $detalhaCliente['cidendclnt'] . " - " . $detalhaCliente['estendclnt']."</td>";
            echo "<th scope='row'><input type='image' id='image' alt='mostrar' src='img/show.png' onclick=\"gerenciarVenda('$url')\"></td>";
            echo "</thead>";
            echo "</tr>";
        }
        echo "<tr style='text-align: center; padding: 0px 0px 0px;; font-size: 25px; font-family: Impact, fantasy;'>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem clientes cadastrados!";
    }
    ?>
</body>
</html>