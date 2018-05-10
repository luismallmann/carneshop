<?php

//require 'dao/usuariodao.php';

session_start();

if (isset($_SESSION) && isset($_SESSION["login"]))
    session_destroy();

if (isset($_POST) && isset($_POST["login"])) {
	// envia para a página principal
	// podemos utilizar a função header + location
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	if (validaLogin($login, $senha)) {
	    //iniciando uma sessão
	    session_start();
	    // grava um usuário na sessão
	    $_SESSION["usuario"] = $_POST["login"]; 
	   header("Location: index.php");
	}
	else 
	    echo '<div class="alert alert-danger" role="alert">
	    Usuário e/ou senha inválidos!
	    </div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- configuracao para adiconar o bootstrap e o jquery -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
			<form action="" method="post" name="frmLogin" style="padding-bottom: 10px">
				Email: <input type="text" name="login" class="form-control" maxlength="20" required="required" placeholder="Email" autofocus="autofocus"/><br/>
				Senha: <input type="password" name="senha" class="form-control" maxlength="20" placeholder="Senha" required="required"/><br/>
				<button name="btnLogin" class="btn btn-primary" type="submit">Login</button>&nbsp;
			</form>
				<a href="cadastrocliente.php">
					<button class="btn btn-danger">	
						Criar Conta
					</button>
				</a>
		</div>
	</div>
</body>
</html>