<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CarneShop</title>
<style type="text/css">
.window {
	display: none;
	width: 300px;
	height: 300px;
	position: absolute;
	left: 0;
	top: 0;
	background: #FFF;
	padding: 0px;
	border-radius: 0px;
}

#mascara {
	position: absolute;
	left: 0;
	top: 0;
	z-index: 9000;
	background-color: #000;
	display: none;
}

.fechar {
	display: block;
	text-align: right;
}

}
.barra {
	vertical-align: center;
}
</style>
<style>
.topo {
	width: 100%;
	height: 300px;
	margin-left: 0px;
	padding-left: 0px;
	margin-right: 0px;
	padding-right: 0px;
	background-color: #8f5227;
}

.contato {
	width: 100%;
	height: 150px;
	text-align: center;
	margin-left: 0px;
	padding-left: 0px;
	margin-right: 0px;
	padding-right: 0px;
}

body {
	margin: 0;
}
</style>
</head>
<!-- chama o arquivo que contem as informacoes do boot strap -->

<body>
	<div class="topo" id="box-topo">
		<a href="index.php"><img src="img/topo.png" alt="CarneShop"
			title="CarneShop"></a>
		<!-- PHP deve iniciar aqui para nao ter uma linha em branco --!>
<?php
session_start();
require_once 'dao/produtodao.php';
$logado = false;
if (isset($_SESSION['login'])) {
    require_once 'dao/clientedao.php';

    $usuario = buscaDadosPessoaisLogin($_SESSION['login']);

    $logado = true;
}
if (isset($_POST) && isset($_POST["qntdped"])) {

    $codprod = $_POST["codprod"];
    $qntdped = $_POST["qntdped"];
    // usa a mesma sessão criada no login

    if ($qntdped > 0) {
        if (buscaQuantidade($codprod) >= $qntdped) {
            $params = '?' . http_build_query(array(
                'codprod' => $codprod,
                'qntdped' => $qntdped
            ));
            if (isset($_SESSION["login"])) {
                $login = $_SESSION["login"];
                $codped = $_SESSION["codped"];
                require_once 'dao/pedidodao.php';
                if (atualizaPedido($codped, $codprod, $qntdped) == true) {
                    header("Location: carrinho.php");
                } else {
                    echo "<script> alert('Quantidade superior ao estoque disponível')</script>";
                }
            } else
                header("Location: loginusuario.php" . $params);
        } else {
            echo "<script> alert('Quantidade superior ao estoque disponível')</script>";
        }
    } else {
        echo "<script> alert('Adicione pelo menos uma Unidade')</script>";
    }
}

include_once 'btsinclude.html';
include_once "exibeprodutos.php";
?>
	</div>
	<div class="row">
		<!-- cria menu lateral -->
		<div class="col-2">
			<div class="list-group" id="list-tab" role="tablist">
				<a class="list-group" style="background-color: #8f5227;"
					list-cat-list" data-toggle="list" role="tab" aria-controls="cat"><font
					color="white" size="4"><b>Produtos</b></font></a> <a
					class="list-group-item list-group-item-action active"
					style="background-color: #f6d18a;"
					list-todos-list" data-toggle="list" href="#list-todos" role="tab"
					aria-controls="todos">Todos <span
					class="badge badge-danger badge-pill"><?php $categoria = "Todos"; contaTodos();?></span></a>
				<a class="list-group-item list-group-item-action"
					style="background-color: #f6d18a;"
					list-bovina-list" data-toggle="list" href="#list-bovina" role="tab"
					aria-controls="bovina">Bovina <span
					class="badge badge-danger badge-pill"><?php $categoria = "Bovina"; contaCategoria($categoria);?></span></a>
				<a class="list-group-item list-group-item-action"
					style="background-color: #f6d18a;"
					list-suina-list" data-toggle="list" href="#list-suina" role="tab"
					aria-controls="profile">Suína <span
					class="badge badge-danger badge-pill"><?php $categoria = "Suina"; contaCategoria($categoria);?></span></a>
				<a class="list-group-item list-group-item-action"
					style="background-color: #f6d18a;"
					list-frango-list" data-toggle="list" href="#list-frango" role="tab"
					aria-controls="frango">Frango <span
					class="badge badge-danger badge-pill"><?php $categoria = "Frango"; contaCategoria($categoria);?></span></a>
				<a class="list-group-item list-group-item-action"
					id="list-outros-list" data-toggle="list" href="#list-outros"
					style="background-color: #f6d18a;" tab" aria-controls="outros">Outros
					<span class="badge badge-danger badge-pill"><?php $categoria = "Outros"; contaCategoria($categoria);?></span>
				</a>
				<a class="list-group-item list-group-item-action" style="background-color: #8f5227;"
					id="list-sobre-list" data-toggle="list" href="#list-sobre"
				"tab" aria-controls="sobre"><font
					color="white" size="4"><b>Sobre</b></font>
				</a>
			</div>
		</div>

		<div class="col-10">
<?php
// verifica se o usuario já está logado, caso estiver exibe o login e permite voltar ao carrinho
if ($logado == true) {
    echo '<div class="row" style="background-color: #bfbfbf";>
	<div class="col">
		<form action="" method="post" name="frmLogado">
		<p align="left">Olá ' . $usuario["nomclnt"] . '!&emsp;(Não é você?
				<input class="sair" name="sair" type="image" src="img/exit.png" value="true"> )
		</p>
		</form>
	</div>
	<div class="col">
		<form action="" method="post" name="frmCarrinho">
		<p align="right">
				<input class="carrinho" name="carrinho" type="image" src="img/buy.png">
		</p>
		</form>
	</div>
</div>';
    if (isset($_POST)) {
        // caso clique em sair
        if (isset($_POST['sair_x'])) {
            session_destroy();
            header("Location: index.php");
        } // caso clique para voltar ao carrinho
        else if (isset($_POST['carrinho_y'])) {
            header("Location: carrinho.php");
        }
    }
}
?>
<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="list-todos"
					role="tabpanel" aria-labelledby="list-todos-list"><?php $categoria = "Todos"; listaTodos()?></div>
				<div class="tab-pane fade" id="list-bovina" role="tabpanel"
					aria-labelledby="list-bovina-list"><?php $categoria = "Bovina"; porCategoria($categoria)?></div>
				<div class="tab-pane fade" id="list-suina" role="tabpanel"
					aria-labelledby="list-suina-list"><?php $categoria = "Suina"; porCategoria($categoria)?></div>
				<div class="tab-pane fade" id="list-frango" role="tabpanel"
					aria-labelledby="list-frango-list"><?php $categoria = "Frango"; porCategoria($categoria)?></div>
				<div class="tab-pane fade" id="list-outros" role="tabpanel"
					aria-labelledby="list-outros-list"><?php $categoria = "Outros"; porCategoria($categoria)?></div>
				<div class="tab-pane fade" id="list-sobre" role="tabpanel"
					aria-labelledby="list-sobre-list"><?php $categoria = "Sobre"; require_once 'sobre.html';?></div>


			</div>
		</div>
	</div>
	<div clas="topo">
		<div class="contato" align="center" style="background-color: #8f5227">
			<h1></h1>
			<font color="white"><b>CarneShop</b><br> | carneshop@carneshop.com.br
				|<br> | (49) 3600-0000 |</font>
			</h1>
			<br> <a href="restrito.php"><img border="0" alt="restrito"
				src="img/user.png" width="56" height="56">
		
		</div>
	</div>
</body>
</html>


