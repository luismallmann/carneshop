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
<!-- mascara cpf -->
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<div class="container">
	<div class="box">
		<h3>Formulário de cadastro</h3>
		<form action="" method="post" name="frmCadastro">
			<div class="form-group">
				<label for="inserirNome">Nome Completo</label> <input type="text"
					name="nome" required="required" class="form-control"
					placeholder="Nome e Sobrenome" maxlength="40">
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inserirCPF">CPF</label> <input type="text" name="cpf"
						required="required" class="form-control" maxlength="14"
						OnKeyPress="formatar('###.###.###-##', this)">
				</div>
				<div class="form-group col-md-4">
					<label for="inserirNascimento">Data de Nascimento</label> <input
						type="date" name="datanas" required="required"
						class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inserirEmail">Email</label> <input type="email"
						name="email" required="required" class="form-control"
						placeholder="Email" maxlength="40">
				</div>
				<div class="form-group col-md-6">
					<label for="inserirSenha">Senha</label> <input type="password"
						name="senha" required="required" class="form-control"
						placeholder="Senha" maxlength="12">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inserirDDD">DDD</label> <input type="text" name="ddd"
						required="required" class="form-control" maxlength="2"
						placeholder="(xx)">
				</div>
				<div class="form-group col-md-4">
					<label for="inserirTelefone">Telefone</label> <input type="text"
						name="telefone" required="required" placeholder="xxxxx-xxxx"
						class="form-control" OnKeyPress="formatar('#####-####', this)"
						maxlength="10">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inserirCidade">Cidade</label> <input type="text"
						name="cidade" required="required" class="form-control"
						maxlength="30">
				</div>
				<div class="form-group col-md-2">
					<label for="inserirUF">Estado</label> <select name="estado"
						required="required" class="form-control">
						<option selected>SC</option>
						<option>PR</option>
						<option>RS</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="inserirCEP">CEP</label> <input type="text" name="CEP"
						required="required" class="form-control" maxlength="9"
						OnKeyPress="formatar('#####-##', this)">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
					<label for="inserirRua">Rua</label> <input type="text" name="rua"
						required="required" class="form-control" maxlength="40">
				</div>
				<div class="form-group col-md-2">
					<label for="inputAddress2">Número</label> <input type="text"
						name="numEnd" required="required" class="form-control"
						maxlength="5">
				</div>
				<div class="form-group col-md-3">
					<label for="inserirComplemento">Complemento</label> <input
						type="text" name="complemento" class="form-control" maxlength="20">
				</div>
				<div class="form-group col-md-2">
					<label for="inserirBairro">Bairro</label> <input type="text"
						name="bairro" required="required" class="form-control"
						maxlength="20">
				</div>
			</div>

			<button name="cadastrarCliente" type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>
</div>