<?php
if (isset($_POST) && isset($_POST["produtoX"])) {
    $produtoX = $_POST["produtoX"];
    if ($produtoX == 0)
        echo '<script>alert("Quantidade deve ser diferente de 0 (zero)!")</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php
require 'btsinclude.html';
?>
<header>
<div id="box-topo" class="container-1230">
<div class="topo">
<a href="http://localhost/carneshop/lista_produtos.php">
<img src="img/topo.png" alt="CarneShop" title="CarneShop">
</a>
</div>
</div>
</header>
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
											id="quantidade" value="0" min="0">
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
											id="quantidade" value="0" min="0">
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
											id="quantidade" value="0" min="0">
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
											id="quantidade" value="0" min="0">
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