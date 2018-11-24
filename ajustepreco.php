<?php
//se está vazio na está logado, entoa requer login
if (empty($_SESSION['usuario'])){
    header("Location: loginfuncionario.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- chama o topo/cabeçalho e o bootstrap -->
	<?php
require_once 'btsinclude.html';
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

<title>Acres/Desc</title>
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Ajuste preço produtos</h3>
			<form action="" method="post" name="frmAjustePreco"
				enctype="multipart/form-data">
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputname">Porcentagem</label> <input
							type="text" name="porcentagem" class="form-control"
							placeholder="%" required="required" min="0">
					</div>
					
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Ajuste</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
require_once 'dao/produtodao.php';


if (isset($_POST)  && isset($_POST['porcentagem'])) {
	if ($_POST['porcentagem'] > 0){
    	if (aumentoPreco($_POST['porcentagem']) == true) {

    		}
		}
    else
    if ($_POST['porcentagem'] < 0){
    	if (descontoPreco($_POST['porcentagem']) == true) {

    		}
    }

}

?>