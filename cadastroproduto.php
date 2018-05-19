
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
	<title>Cadastro de produto</title>
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Cadastro de Produto</h3>
			<form>
				<div class="form-row">
					<div class="col">
						<label for="inputname">Nome do Produto</label>
						<input type="text" class="form-control" placeholder="Nome">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputname">Estoque (Em kg)</label>
						<input type="numeric" class="form-control" placeholder="Estoque">
					</div>
					<div class="col">
						<label for="inputpreço">Preço por Kg</label>
						<input type="numeric" class="form-control" placeholder="Preço">
					</div>
				</div>
				<br>
				<div class="form-row">					
					<div class="col">
						<label for="inputimagem">Imagem (500x500 pixels)</label>
						<input type="file" class="form-control" placeholder="Imagem">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputdescrição">Descrição</label>
						<input type="text" class="form-control" placeholder="Descrição">
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>