<?php
require 'dao/produtodao.php';
session_start();
$logado = false;
if (isset($_SESSION['login'])) {
    require 'dao/clientedao.php';
    
    $usuario = buscaDadosPessoaisLogin($_SESSION['login']);
    
    $logado = true;
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
			<img src="img/carne.png" alt="CarneShop" title="CarneShop"></a>
		</div>
	</div>
</div>
<style type="text/css">
.window {
	display: none;
	width: 300px;
	height: 300px;
	position: absolute;
	left: 0;
	top: 0;
	background: #FFF;
	z-index: 9900;
	padding: 10px;
	border-radius: 10px;
}

#mascara {
	position: absolute;
	left: 0;
	top: 0;
	z-index: 9000;
	background-color: #000;
	display: none;
}
.fechar {
	display: block;
	text-align: right;
} 
}
.barra{
    vertical-align: center;
}
</style>
</head>


<body>	
<?php
//verifica se o usuario já está logado, caso estiver exibe o login  e permite voltar ao carrinho
if($logado == true){
    echo '<div class="row" style="background-color: #bfbfbf";>
	<div class="col">
		<form action="" method="post" name="frmLogado">
		<p align="left">Olá '.$usuario["nomclnt"].'!&emsp;(Não évocê?
				<input class="sair" name="sair" type="image" src="img/exit.png" value="true"> )
		</p>
		</form>
	</div>
	<div class="col">
		<form action="" method="post" name="frmCarrinho">
		<p align="right">
				<input class="carrinho" name="carrinho" type="image" src="img/buy.png">
		</p>
		</form>
	</div>
</div>';   
    if(isset($_POST)){
        //caso clique em sair
        if(isset($_POST['sair_x'])){
            session_destroy();
        }
        //caso clique para voltar ao carrinho
        else if(isset($_POST['carrinho_y'])){
            header("Location: carrinho.php");
        }
    }
    
}

//lista os produtos cadastrados
    $produto = lista();
    if ($produto != null && count($produto) > 0) {
        echo "<div align='center'>";
        echo "<table>";
        foreach ($produto as $cat) {
            echo "<tr>";
            echo "<td>";
            echo "<img src='imgproduto/" . $cat["imgprod"] . "'/>";
            echo "</td>";
            echo "<td>";
            echo "<p style='text-align: center; padding: 10px 0px 0px; color: #B22222; font-size: 30px; font-family: Impact, fantasy;'>" . $cat['nomprod'] . "</p>";
            
            echo "<p style='text-align: justify; margin: 10px; color: #696969; font-size: 22px; font-family: Times, serif;'>" . $cat["desprod"] . "</p>";
            
            echo "<p style='text-align: justify; margin: 10px; color: #696969; font-size: 22px; font-family: Times, serif;'>Preço por kg: R$ " . $cat["valprod"] . "</p>";
            
            echo "<form style='padding: 10px' action='' method='post' name='frmAdicionar" . $cat["codprod"] . "'>
									<div class='input-group mb-1'>
										<div class='input-group-prepend'>
											<div class='input-group-text'>+/-</div>
										</div>
                                        <input type='hidden' name='codprod' class='form-control'
											id='cod' value='" . $cat["codprod"] . "'>            
										<input type='number' name='qntdped' class='form-control'
											id='quantidade' min='1'>
									</div>
							</div>
						</div>
						<button style='margin: 3px 30%' name='add' class='btn btn-danger' type='submit'>Adicionar</button>
						</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Não existem produtos cadastrados!";
    }
    ?>
</body>
</html>
<?php
if (isset($_POST) && isset($_POST["qntdped"])) {
    
    $codprod = $_POST["codprod"];
    $qntdped = $_POST["qntdped"];
    // usa a mesma sessão criada no login
    
    if ($qntdped > 0) {
        $params = '?' . http_build_query(array(
            'codprod' => $codprod,
            'qntdped' => $qntdped
        ));
        
        session_start();
        if (isset($_SESSION["login"])) {
            $login = $_SESSION["login"];
            $codped = $_SESSION["codped"];
            require 'dao/pedidodao.php';
            atualizaPedido($codped, $codprod, $qntdped);
            
            header("Location: carrinho.php");
        } else
            header("Location: loginusuario.php" . $params);
    } else {
        echo "<script> alert('Adicione pelo menos uma Unidade')</script>')";
    }
}
?>

