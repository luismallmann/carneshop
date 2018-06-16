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
    <a class="nav-link" id="pills-cadastroproduto-tab" data-toggle="pill" href="#pills-cadastroproduto" role="tab" aria-controls="pills-cadastroproduto" aria-selected="false">Cadastrar Produto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-estoque-tab" data-toggle="pill" href="#pills-estoque" role="tab" aria-controls="pills-estoque" aria-selected="false">Lista de Produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-vendas-tab" data-toggle="pill" href="#pills-vendas" role="tab" aria-controls="pills-vendas" aria-selected="false">Vendas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-funcionario-tab" data-toggle="pill" href="#pills-funcionario" role="tab" aria-controls="pills-funcionario" aria-selected="false">Cadastrar funcionario</a>
  </li>
    <a class="nav-link" href="index.php">Sair</a>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-inicio" role="tabpanel" aria-labelledby="pills-inicio-tab">Seja bem vindo ao Sistema Especial de E-commerce que nem funciona do brasil que apoia o apoio apoiado dos camioneiros!<br><br>Suporte com ......</div>
  <div class="tab-pane fade" id="pills-cadastroproduto" role="tabpanel" aria-labelledby="pills-cadastroproduto-tab">/<?php include_once 'cadastroproduto.php'; ?>*/</div>
  <div class="tab-pane fade" id="pills-vendas" role="tabpanel" aria-labelledby="pills-vendas"><?php include "vendas.php"; ?></div>
  <div class="tab-pane fade" id="pills-estoque" role="tabpanel" aria-labelledby="pills-estoque-tab"><?php include_once "listadeprodutos.php"; ?></div>
  <div class="tab-pane fade" id="pills-funcionario" role="tabpanel" aria-labelledby="pills-funcionario-tab"><?php include "cadastro_funcionario_formulario.php"; ?></div>
</div>
</body>
</html>