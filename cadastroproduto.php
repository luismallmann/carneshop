<?php
require 'dao/usuariodao.php';
if (isset($_POST) && isset($_POST['nome']) && isset($_POST['estoque']) && isset($_POST['preco'])) {
    cadastraProduto($_POST);
} else {
    echo "erro";
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
<script
	src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"
	type="text/javascript"></script>
<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
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
<script type="text/javascript">
 $(function() {
	    $('#moeda').maskMoney({ thousands:'', decimal:'.'});
	  })
    </script>

<title>Cadastro de produto</title>
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Cadastro de Produto</h3>
			<form action="" method="post" name="frmCadastroProduto">
				<div class="form-row">
					<div class="col">
						<label for="inputname">Nome do Produto</label> <input type="text"
							name="nome" class="form-control" placeholder="Nome"
							required="required" maxlength="40">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputname">Estoque (Em kg)</label> <input
							type="number" name="estoque" class="form-control"
							placeholder="Estoque" required="required" min="0">
					</div>
					<div class="col">
						<label for="inputpreço">Preço por Kg (R$)</label> <input type="text"
							name="preco" class="form-control" placeholder="Preço"
							required="required" min="0" id="moeda">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputimagem">Imagem (500x500 pixels)</label> <input
							type="file" name="imagem" class="form-control"
							placeholder="Imagem" accept="image/*">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputdescrição">Descrição</label> <input type="text"
							name="descricao" class="form-control" placeholder="Descrição"
							maxlength="140">
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>