<style>
    div.tam{
    max-width: 250px;
    min-width: 200px;
}
</style>
<?php
require_once 'dao/produtodao.php';
// lista todos os produtos cadastrados
function listaTodos()
{
    $produto = lista();
    echo "<div class='container'>
<div class='row'>";
    
    if ($produto != null && count($produto) > 0) {
        foreach ($produto as $cat) {
            ?>
			<div class="tam">
		<table class="table">
			<?php echo "<tr>
				<td><img src='imgproduto/" . $cat["imgprod"] . "' align='center'>
					<p
						style='text-align: center; margin: 0px 0px 0px; color: #B22222; font-size: 22px; font-family: Impact, fantasy;'>"
						. $cat['nomprod'] . "</p>
					<p
						style='text-align: center; margin: 0px; color: #696969; font-size: 16px; font-family: Times, serif;'>"
						. $cat["desprod"] . "</p>
					<p
						style='text-align: center; margin: 0px; color: #696969; font-size: 16px; font-family: Times, serif;'>Preço
						por kg: R$ " . $cat["valprod"] . "</p>

					<form style='padding: 10px' action='' method='post'
						name='frmAdicionar" . $cat["codprod"] . "'>
						<div class='input-group mb-1'>
							<div class='input-group-prepend'>
								<div class='input-group-text'>+/-</div>
							</div>
							<input type='hidden' name='codprod' class='form-control' id='cod'
								value='" . $cat["codprod"] . "'> <input type='number'
								name='qntdped' class='form-control' id='quantidade' min='1'>
						</div>
						<button style='margin: 3px 30%' name='add' class='btn btn-danger'
							type='submit'>Adicionar</button>
					</form>
				</td>
			</tr> "?>
		</table>
	</div>
	<!--  final div col -->
		<?php
        } // final do foreach
    } else {
        echo "Não existem produtos cadastrados!";
    }
    ?>
		</div>
<!-- final div row -->
</div>
<!--  final div container -->
<?php
}

// final da funcao

// lista os produtos cadastrados por categoria
function porCategoria($categoria)
{
    $produto = listaCategoria($categoria);
    echo "<div class='container'>
<div class='row'>";
    
    if ($produto != null && count($produto) > 0) {
        foreach ($produto as $cat) {
            ?>
			<div class="tam">
		<table class="table">
			<?php echo "<tr>
				<td><img src='imgproduto/" . $cat["imgprod"] . "' align='center'>
					<p
						style='text-align: center; margin: 0px 0px 0px; color: #B22222; font-size: 22px; font-family: Impact, fantasy;'>"
						. $cat['nomprod'] . "</p>
					<p
						style='text-align: center; margin: 0px; color: #696969; font-size: 16px; font-family: Times, serif;'>"
						. $cat["desprod"] . "</p>
					<p
						style='text-align: center; margin: 0px; color: #696969; font-size: 16px; font-family: Times, serif;'>Preço
						por kg: R$ " . $cat["valprod"] . "</p>

					<form style='padding: 10px' action='' method='post'
						name='frmAdicionar" . $cat["codprod"] . "'>
						<div class='input-group mb-1'>
							<div class='input-group-prepend'>
								<div class='input-group-text'>+/-</div>
							</div>
							<input type='hidden' name='codprod' class='form-control' id='cod'
								value='" . $cat["codprod"] . "'> <input type='number'
								name='qntdped' class='form-control' id='quantidade' min='1'>
						</div>
						<button style='margin: 3px 30%' name='add' class='btn btn-danger'
							type='submit'>Adicionar</button>
					</form>
				</td>
			</tr> "?>
		</table>
	</div>
	<!--  final div col -->
		<?php
        } // final do foreach
    } else {
        echo "Não existem produtos cadastrados!";
    }
    ?>
		</div>
<!-- final div row -->
</div>
<!--  final div container -->

<?php 
}

function contaCategoria($categoria)
{
    print contCategoria($categoria);
}

function contaTodos()
{
    print contTodos();
}

?>
