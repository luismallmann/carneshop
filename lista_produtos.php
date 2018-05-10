<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!-- chama o arquivo que contem as informacoes do boot strap -->
<?php require 'btsinclude.html'; ?>

<!-- constroi a linha de produtos-->
<div class="row">
	<!--inicia produto-->
	<div class="col-sm-2">
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
							<label class="sr-only" for="quantidade"></label>
							<div class="input-group mb-1">
								<div class="input-group-prepend">
									<div class="input-group-text">+/-</div>
								</div>
								<input type="number" class="form-control" id="quantidade" value="0" min="0">
							</div>
						</div>
					</div>
					<a href="#" class="btn btn-danger">Adicionar</a>
				</center>
			</div>
		</div>
	</div>
	<!--finaliza produto-->
</div>
<!-- finaliza a linha de produtos-->
</br>



</head>
</html>