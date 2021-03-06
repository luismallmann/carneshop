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

<title>Cadastro de produto</title>
</head>
<body>
	<div class="container">
		<div class="box">
			<h3>Cadastro de Produto</h3>
			<form action="" method="post" name="frmCadastroProduto"
				enctype="multipart/form-data">
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
						<label for="inputpreço">Preço por Kg (R$)</label> <input
							type="text" name="preco" class="form-control" placeholder="Preço"
							required="required" min="0" id="moeda">
					</div>
				</div>
				<br>
				<div class="form-row">
					<div class="col">
						<label for="inputimagem">Imagem (tamanho máximo 260x260 pixels)</label>
						<input type="file" name="imagem" class="form-control"
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
				<div class="form-group">
					<label for="inserirCat">Categoria</label> <select name="categoria"
						required="required" class="form-control">
						<option selected>Bovina</option>
						<option>Suina</option>
						<option>Frango</option>
						<option>Outros</option>
					</select>
				</div>
				<br>
				<button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
require_once 'dao/produtodao.php';
if (! empty($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];
    $teste = true;
    
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
    // Pega as dimensões da imagem
    $dimensoes = getimagesize($imagem["tmp_name"]);
    
    if ($dimensoes == null) {
        $nome_imagem = "noimage.png";
    } else {
        // Verifica se a largura da imagem é maior que a largura permitida
        if ($dimensoes[0] > 260 || ($dimensoes[1] > 260)) {
            echo '<script> alert("Tamanho da imagem não deve ultrapassar 260px X 260px. Tamanho Atual: ' . $dimensoes[0] . 'px X ' . $dimensoes[1] . 'px");</script>';
            
            $teste = false;
        }
        
        if ($teste == true) {
            
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            
            // Caminho de onde ficará a imagem
            $caminho_imagem = "imgproduto/" . $nome_imagem;
            
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
        }
    }
}

if (isset($_POST) && isset($_POST['nome']) && isset($_POST['estoque']) && isset($_POST['preco']) && isset($_POST['categoria'])) {
    cadastraProduto($_POST, $nome_imagem);
    echo $nome_imagem;
}

?>