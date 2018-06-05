<div class="container">
		<div class="box">
			<h3>Cadastro de Funcionários</h3>
			<form>
				<div class="form-group">
					<label for="inserirNome">Nome Completo</label> <input type="text" name="nome" required="required" class="form-control" 
					placeholder="Nome e Sobrenome" maxlength="40">
				</div>
				<div class="form-row">
				<div class="form-group col-md-6">
						<label for="inserirLogin">Login</label> <input type="text" name="login" required="required"
							class="form-control" placeholder="Login" maxlength="20">
					</div>
				<div class="form-group col-md-6">
					<label for="inserirSenha">Senha</label> <input type="password" name="senha" required="required"	class="form-control" 
						placeholder="Senha" maxlength="12">
				</div>
				</div>
				<button type="submit" class="btn btn-primary">Cadastrar</button>	
			</form>
		</div>
	</div>