<?php
if (isset($_POST) && isset($_POST["produtoX"])) {
    $produtoX = $_POST["produtoX"];
    
    header("Location: loginusuario.php");
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
			<a href="http://localhost/carneshop/lista_produtos.php"> <img
				src="img/logo.png" alt="CarneShop" title="CarneShop">
			</a>
		</div>
		<div class="col-md-auto"></div>
		<div class="col">
			<img src="img/carne.png" alt="CarneShop" title="CarneShop"> </a>
		</div>
	</div>
</div>
</br>
<!-- constroi a linha de produtos-->
<div class="container">
	<div class="row">
		<!--inicia produto-->
		<div class="col">
			<!-- 2 define o tamanho -->
			<div class="card">
				<div class="card-body">
					<center>
						<img class="foto do produto" src="img/icon.png"
							alt="foto do produto">
						<p class="card-text">nome do produto.</p>
						<!-- ajustar método envio -->

						<div class="form-row align-items-center">
							<div class="col-auto">

								<form action="" method="post" name="frmAdicionar">
									<div class="input-group mb-1">
										<div class="input-group-prepend">
											<div class="input-group-text">+/-</div>
										</div>
										<input type="number" name="produtoX" class="form-control"
											id="quantidade" value="1" min="1">
									</div>
							
							</div>
						</div>

						<button name="add" class="btn btn-danger" type="submit">Adicionar</button>
						</form>
					</center>
				</div>
			</div>
		</div>
		<!--finaliza produto-->
		<div class="col">
			<!-- 2 define o tamanho -->
			<div class="card">
				<div class="card-body">
					<center>
						<img class="foto do produto" src="img/icon.png"
							alt="foto do produto">
						<p class="card-text">nome do produto.</p>
						<!-- ajustar método envio -->

						<div class="form-row align-items-center">
							<div class="col-auto">

								<form action="" method="post" name="frmAdicionar">
									<div class="input-group mb-1">
										<div class="input-group-prepend">
											<div class="input-group-text">+/-</div>
										</div>
										<input type="number" name="produtoX" class="form-control"
											id="quantidade" value="1" min="1">
									</div>
							
							</div>
						</div>

						<button name="add" class="btn btn-danger" type="submit">Adicionar</button>
						</form>
					</center>
				</div>
			</div>
		</div>
		<!--finaliza produto-->
		<div class="col">
			<!-- 2 define o tamanho -->
			<div class="card">
				<div class="card-body">
					<center>
						<img class="foto do produto" src="img/icon.png"
							alt="foto do produto">
						<p class="card-text">nome do produto.</p>
						<!-- ajustar método envio -->

						<div class="form-row align-items-center">
							<div class="col-auto">

								<form action="" method="post" name="frmAdicionar">
									<div class="input-group mb-1">
										<div class="input-group-prepend">
											<div class="input-group-text">+/-</div>
										</div>
										<input type="number" name="produtoX" class="form-control"
											id="quantidade" value="1" min="1">
									</div>
							
							</div>
						</div>

						<button name="add" class="btn btn-danger" type="submit">Adicionar</button>
						</form>
					</center>
				</div>
			</div>
		</div>
		<!--finaliza produto-->
		<div class="col">
			<!-- 2 define o tamanho -->
			<div class="card">
				<div class="card-body">
					<center>
						<img class="foto do produto" src="img/icon.png"
							alt="foto do produto">
						<p class="card-text">nome do produto.</p>
						<!-- ajustar método envio -->

						<div class="form-row align-items-center">
							<div class="col-auto">

								<form action="" method="post" name="frmAdicionar">
									<div class="input-group mb-1">
										<div class="input-group-prepend">
											<div class="input-group-text">+/-</div>
										</div>
										<input type="number" name="produtoX" class="form-control"
											id="quantidade" value="1" min="1">
									</div>
							
							</div>
						</div>

						<button name="add" class="btn btn-danger" type="submit">Adicionar</button>
						</form>
					</center>
				</div>
			</div>
		</div>
		<!--finaliza produto-->

	</div>
</div>
<!-- finaliza a linha de produtos-->
</br>
</head>
</html>

