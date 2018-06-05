<?php

require 'dao/produtodao.php';

if (isset($_POST) && isset($_POST["produtoX"])) {
    $produtoX = $_POST["produtoX"];
    
    header("Location: loginusuario.php");
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
			<a href="http://localhost/carneshop/lista_produtos.php"> <img
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
    <?php
	    $produto = lista();
        if ($produto != null && count($produto) > 0) {
            echo "<table border='1'>";
            echo "<tr> <td>imagem</td> <td>nome</td> </tr>";
            foreach ($produto as $cat) {
                echo "<tr>";
	                echo "<td>";
    		            echo "<img src='imgproduto/" . $cat["imgprod"]."'/>";
            	    echo "</td>";
                	echo "<td>";
                		echo $cat["nomprod"];
                		echo "<br/>";
                		echo "Descrição: ";
                		echo $cat["desprod"];
                		echo "<br />";
                		echo "Preco por kg: ";
                		echo $cat["valprod"];
                		echo "<br />";

                		echo "<form action='' method='post' name='frmAdicionar'>
									<div class='input-group mb-1'>
										<div class='input-group-prepend'>
											<div class='input-group-text'>+/-</div>
										</div>
										<input type='number' name='produtoX' class='form-control'
											id='quantidade' value='1' min='1'>
									</div>
							</div>
						</div>
						<button name='add' class='btn btn-danger' type='submit'>Adicionar</button>
						</form>";
               		echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "Não existem produtos cadastrados!";
        }
        ?>
</body>
</html>

