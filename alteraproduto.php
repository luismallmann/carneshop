<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- chama o topo/cabeçalho e o bootstrap -->
<?php
require_once 'btsinclude.html';
require_once 'dao/produtodao.php';
?>
<script
	src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"
	type="text/javascript"></script>
<script src="js/jquery.maskMoney.min.js" type="text/javascript"></script>
<script>
function closeJanela() {
		alert("O produto NÃO foi alterado!");
		
	  		window.close();
	}
function fecharAlteracao(){
	alert("O Produto foi alterado!");
	
  		window.close();

  		window.opener.location.reload();	
}
</script>
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
		<?php 
			$codigo = $_GET['codprod'];
			$produto=buscaProduto($codigo);
			?>
			<br><br>
			<h3>Atualizar Produto</h3>
			<form action="" method="post" name="frmAlteraProduto"
				enctype="multipart/form-data">
				<div class="form-row">
					<div class="col">
						<label for="inputname">Nome do Produto</label> <input type="text"
							name="nome" class="form-control" placeholder="Nome"
							required="required" maxlength="40" value="<?php echo $produto['nomprod']?>">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputname">Estoque (Em kg)</label> <input
							type="number" name="estoque" class="form-control"
							placeholder="Estoque" required="required" min="0" value="<?php echo $produto['estprod']?>">
					</div>
					<div class="col">
						<label for="inputpreço">Preço por Kg (R$)</label> <input
							type="text" name="preco" class="form-control" placeholder="Preço"
							required="required" min="0" id="moeda" value="<?php echo $produto['valprod']?>">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputdescrição">Descrição</label> <input type="text"
							name="descricao" class="form-control" placeholder="Descrição"
							maxlength="140" value="<?php echo $produto['desprod']?>">
					</div>
				</div>
				<br>
							<button name='cancelar' class='btn btn-outline-danger btn-lg'
							type='submit' onclick="closeJanela();">Cancelar</button></a>				
				<button type="submit" name="alterar" class="btn btn-primary btn-lg">Alterar</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
if (isset($_POST) && isset($_POST['nome']) && isset($_POST['estoque']) && isset($_POST['preco']) &&isset($_POST['alterar'])) {

    if(atualiza($codigo,$_POST)==true){
        echo "<script>fecharAlteracao();</script>";
    }
}

?>