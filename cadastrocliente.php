
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
			<a href="http://localhost/carneshop/lista_produtos.php"> <img
				src="img/logo.png" alt="CarneShop" title="CarneShop">
			</a>
		</div>
		<div class="col-md-auto"></div>
		<div class="col">
		<img src="img/carne.png" alt="CarneShop" title="CarneShop">
			</a>
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
	width: 600px;
	height: 600px;
	background: #fff;
}
</style>
<title>Cadastro de cliente</title>
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Formulário de cadastro</h3>
			<form>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Email</label> <input type="email"
							class="form-control" id="inputEmail4" placeholder="Email">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Senha</label> <input type="password"
							class="form-control" id="inputPassword4" placeholder="Senha">
					</div>
				</div>
				<div class="form-group">
					<label for="inputAddress">Nome Completo</label> <input type="text"
						class="form-control" id="inputAddress"
						placeholder="Nome e Sobrenome">
				</div>
				<div class="form-group">
					<label for="inputAddress">Telefone</label> <input type="number"
						class="form-control" id="inputAddress"
						placeholder="(xx) xxxxx-xxxx">
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputCity">Cidade</label> <input type="text"
							class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
						<label for="inputState">Estado</label> <select id="inputState"
							class="form-control">
							<option selected>Santa Catarina</option>
							<option>Paraná</option>
							<option>Rio Grande do Sul</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">CEP</label> <input type="text"
							class="form-control" id="inputZip">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputAddress2">Rua</label> <input type="text"
							class="form-control" id="inputAddress2">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Número / Complemento</label> <input
							type="text" class="form-control" id="inputAddress2">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>