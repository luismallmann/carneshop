<?php
if (isset($_POST) && isset($_POST["login"])) {
    require 'dao/clientedao.php';
    // envia para a página principal
    // podemos utilizar a função header + location
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if (validaLogin($login, $senha)) {
        // iniciando uma sessão
        session_start();
        // grava um usuário na sessão
        $_SESSION["login"] = $_POST["login"];
        
        $codprod = $_GET["codprod"];
        $qntdped = $_GET["qntdped"];
        // grava produto do pedido no banco
        
        require 'dao/pedidodao.php';
        $cpfclnt = buscaCPF($login);
        
        $codped = cadastraPedidoNovo($cpfclnt);
        
        if ($codped != null) {
            $_SESSION["codped"] = $codped;
            cadastraPedido($codprod, $codped, $qntdped);
            
            header("Location: carrinho.php");
        }
        
      
        else{
            echo "erro ao cadastrar";
        }
    } else
        echo '<div class="alert alert-danger" role="alert">
	    Email e/ou senha inválidos!
	    </div>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- chama o topo/cabeçalho e o bootstrap -->
<?php
require 'btsinclude.html';
?>
<!--constroi o topo-->
<div id="box-topo" class="container-1230"
	style="background-color: #8f5227";>
	<div class="row">
		<div class="col">
			<a href="index.php"> <img
				src="img/logo.png" alt="CarneShop" title="CarneShop">
			</a>
		</div>
		<div class="col-md-auto"></div>
		<div class="col">
			<img src="img/carne.png" alt="CarneShop" title="CarneShop"> </a>
		</div>
	</div>
</div>
<style>
.container {
	width: 100vw;
	height: 100vh;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

.box {
	width: 300px;
	height: 300px;
	background: #fff;
}
</style>
<title>Login de Cliente</title>
</head>
<body>

	<div class="container">
		<div class="box">
			<h3>Login na Conta</h3>
			<form action="" method="post" name="frmLogin"
				style="padding-bottom: 10px">
				Email: <input type="text" name="login" class="form-control"
					maxlength="40" required="required" placeholder="Email"
					autofocus="autofocus" /> <br /> Senha: <input type="password"
					name="senha" class="form-control" maxlength="20"
					placeholder="Senha" required="required" /> <br />
				<button name="btnLogin" class="btn btn-primary" type="submit">Login</button>
				&nbsp;
			</form>
			<a href="cadastrocliente.php">
				<button class="btn btn-danger">Criar Conta</button>
			</a>
		</div>
	</div>
</body>
</html>