
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
						<label for="inputEmail4">Email</label>
						<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    				</div>
				    <div class="form-group col-md-6">
				    	<label for="inputPassword4">Senha</label>
				    	<input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
				    </div>
				</div>
				<div class="form-group">
					<label for="inputAddress">Nome Completo</label>
					<input type="text" class="form-control" id="inputAddress" placeholder="Nome e Sobrenome">
				</div>
				<div class="form-group">
					<label for="inputAddress">Telefone</label>
					<input type="number" class="form-control" id="inputAddress" placeholder="(xx) xxxxx-xxxx">
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputCity">Cidade</label>
						<input type="text" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
						<label for="inputState">Estado</label>
						<select id="inputState" class="form-control">
							<option selected>Santa Catarina</option>
							<option>Paraná</option>
							<option>Rio Grande do Sul</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">CEP</label>
						<input type="text" class="form-control" id="inputZip">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputAddress2">Rua</label>
						<input type="text" class="form-control" id="inputAddress2">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Número / Complemento</label>
						<input type="text" class="form-control" id="inputAddress2">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>