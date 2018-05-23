<?php
	// usa a mesma sessão criada no login
	session_start();
	if (isset($_SESSION["usuario"])) 
		// recupera os dados do usuário
		$usuario = $_SESSION["usuario"];
	else header("Location: login.php");
?>