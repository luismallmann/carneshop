<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Restrito - CarneShop</title>
<?php
require_once 'btsinclude.html';
?>
</header>
<body>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-inicio-tab" data-toggle="pill" href="#pills-inicio" role="tab" aria-controls="pills-inicio" aria-selected="true" >Inicio</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-funcionario-tab" data-toggle="pill" href="#pills-funcionario" role="tab" aria-controls="pills-funcionario" aria-selected="false">Cadastrar funcionario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-cadastroproduto-tab" data-toggle="pill" href="#pills-cadastroproduto" role="tab" aria-controls="pills-cadastroproduto" aria-selected="false">Cadastrar Produto</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="pills-clientes-tab" data-toggle="pill" href="#pills-clientes" role="tab" aria-controls="pills-clientes" aria-selected="false">Clientes Cadastrados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-estoque-tab" data-toggle="pill" href="#pills-estoque" role="tab" aria-controls="pills-estoque" aria-selected="false">Listar/Editar Produtos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-vendas-tab" data-toggle="pill" href="#pills-vendas" role="tab" aria-controls="pills-vendas" aria-selected="false">Vendas Realizadas</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-relatorios-tab" data-toggle="pill" href="#pills-relatorios" role="tab" aria-controls="pills-relatorios" aria-selected="false">Relatórios(Roberson)</a>
  </li>
 
    <a class="nav-link" href="index.php">Sair</a>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-inicio" role="tabpanel" aria-labelledby="pills-inicio-tab" align="center" style="background-color: #8f5227";><img src="img/logo.png" align="middle"></div>
  <div class="tab-pane fade" id="pills-cadastroproduto" role="tabpanel" aria-labelledby="pills-cadastroproduto-tab">/<?php include_once 'cadastroproduto.php'; ?>*/</div>
   <div class="tab-pane fade" id="pills-clientes" role="tabpanel" aria-labelledby="pills-clientes"><?php include "listaClientes.php"; ?></div>
  <div class="tab-pane fade" id="pills-vendas" role="tabpanel" aria-labelledby="pills-vendas"><?php include "vendas.php"; ?></div>
  <div class="tab-pane fade" id="pills-estoque" role="tabpanel" aria-labelledby="pills-estoque-tab"><?php include_once "listadeprodutos.php"; ?></div>
  <div class="tab-pane fade" id="pills-funcionario" role="tabpanel" aria-labelledby="pills-funcionario-tab"><?php include "cadastro_funcionario_formulario.php"; ?></div>
	<div class="tab-pane fade" id="pills-relatorios" role="tabpanel" aria-labelledby="pills-relatorios-tab"><?php include "relatorios.php"; ?></div>
</div>
</body>
</html>