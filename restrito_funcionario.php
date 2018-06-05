<!DOCTYPE html>
	
<html>
<head>
<meta charset="UTF-8">

<title>Restrito - CarneShop</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-grid.min.css" rel="stylesheet">
<link href="css/bootstrap-reboot.min.css" rel="stylesheet">

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<?php
require 'btsinclude.html';
?>
	
</header>
<body>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-inicio-tab" data-toggle="pill" href="#pills-inicio" role="tab" aria-controls="pills-inicio" aria-selected="true">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-estoque-tab" data-toggle="pill" href="#pills-estoque" role="tab" aria-controls="pills-contact" aria-selected="false">estoque produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-clientes-tab" data-toggle="pill" href="#pills-clientes" role="tab" aria-controls="pills-clientes" aria-selected="false">Cadastro clientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Cadastro funcionarios</a>
  </li>
    <a class="nav-link" href="http://127.0.0.1/carneshop/index.php">Sair</a>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-inicio" role="tabpanel" aria-labelledby="pills-inicio-tab">Seja bem vindo ao Sistema Especial de E-commerce que nem funciona do brasil que apoia o apoio apoiado dos camioneiros!<br><br>Suporte com ......</div>
  <div class="tab-pane fade" id="pills-clientes" role="tabpanel" aria-labelledby="pills-clientes-tab"><?php include "cadastro_cliente_formulario.php"; ?></div>
  <div class="tab-pane fade" id="pills-estoque" role="tabpanel" aria-labelledby="pills-estoque-tab"><?php include "cadastroproduto.php"; ?></div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><?php include "cadastro_funcionario_formulario.php"; ?></div>
</div>
</body>
</html>