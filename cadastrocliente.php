<!-- chama o topo/cabeçalho e o bootstrap -->
	<?php
require_once 'btsinclude.html';
require_once 'dao/clientedao.php';

if (isset($_POST) && isset($_POST["nome"]) && isset($_POST["sexo"]) && isset($_POST["cpf"]) 
    && isset($_POST["datanas"]) && isset($_POST["email"]) && isset($_POST["senha"]) && 
    isset($_POST["dddObg"]) && isset($_POST["telefoneObg"]) && isset($_POST["cidade"]) && isset($_POST["estado"]) && isset($_POST["CEP"]) && isset($_POST["rua"])   && isset($_POST["numEnd"]) && isset($_POST["bairro"])) {
    $retorno = cadastraUsuario($_POST);
    echo $retorno;
    if($retorno == TRUE){
        header("Location: index.php");
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!--constroi o topo-->
<div id="box-topo" class="container-1230"
	style="background-color: #8f5227";>
	<div class="row">
		<div class="col">
			<a href="index.php"> <img
				src="img/logo.png" alt="CarneShop" title="CarneShop">
			</a>
		</div>
		<div class="col-md-auto"></div>
		<div class="col">
			<img src="img/carne.png" alt="CarneShop" title="CarneShop"> </a>
		</div>
	</div>
</div>
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
<title>CarneShop</title>
</head>
<body>
<div class="container">
	<div class="box">
		<h3>Formulário de cadastro</h3>
		<form action="" method="post" name="frmCadastro">
			<div class="form-group">
				<label for="inserirNome">Nome Completo*</label> <input type="text"
					name="nome" required="required" class="form-control"
					placeholder="Nome e Sobrenome" maxlength="40">
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inserirCPF">CPF*</label> <input type="text" name="cpf" id="inputCpf"
						required="required" class="form-control" maxlength="14"
						>
						<!--OnKeyPress="formatar('###.###.###-##', this)"-->
					<script>
						
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000"){
		alert("CPF invalido");
		return;
	}
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) {
		alert("CPF invalido");
		return;
	}
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) {
		alert("CPF invalido");
		return;
	}
}

						
						var campo = document.getElementById("inputCpf");
						campo.addEventListener("blur", function(e) {
							TestaCPF(campo.value);
						});
						
 
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
		} //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };						
					</script>
				</div>
				
				<div class="form-group col-md-4">
					<label for="inserirNascimento">Data de Nascimento*</label> <input
						type="date" name="datanas" required="required"
						class="form-control">
				</div>
			</div>
				<div class="form-row">
				<div class="form-group col-md-4">
					<label for="sexo">Sexo*</label><br> 
					<input type="radio" name="sexo" value="F"> Feminino
					<input type="radio" name="sexo" value="M"> Masculino
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inserirEmail">Email*</label> <input type="email"
						name="email" required="required" class="form-control"
						placeholder="Email" maxlength="40">
				</div>
				<div class="form-group col-md-6">
					<label for="inserirSenha">Senha*</label> <input type="password"
						name="senha" required="required" class="form-control"
						placeholder="Senha" maxlength="12">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inserirDDDObg">DDD*</label> <input type="text" name="dddObg"
						required="required" class="form-control" maxlength="2"
						placeholder="(xx)">
				</div>
				<div class="form-group col-md-4">
					<label for="inserirTelefoneObg">Telefone - 1*</label> <input type="text"
						name="telefoneObg" required="required" placeholder="xxxxx-xxxx"
						class="form-control" OnKeyPress="formatar('#####-####', this)"
						maxlength="10">
				</div>
			</div>
				<div class="form-row">
				<div class="form-group col-md-2">
					<label for="inserirDDDOpc">DDD</label> <input type="text" name="dddOpc"
						class="form-control" maxlength="2"
						placeholder="(xx)">
				</div>
				<div class="form-group col-md-4">
					<label for="inserirTelefoneOpc">Telefone - 2</label> <input type="text"
						name="telefoneOpc" placeholder="xxxxx-xxxx"
						class="form-control" OnKeyPress="formatar('#####-####', this)"
						maxlength="10">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inserirCEP">CEP*</label> <input type="text" name="CEP"
						required="required" class="form-control" maxlength="9"
						OnKeyPress="formatar('#####-##', this)"
						 onblur="pesquisacep(this.value);">
				</div>
				<div class="form-group col-md-6">
					<label for="inserirCidade">Cidade*</label> <input type="text" id="cidade"
						name="cidade" required="required" class="form-control"
						maxlength="30">
				</div>
				<div class="form-group col-md-2">
					<label for="inserirUF">Estado*</label> <select name="estado" id="uf"
						required="required" class="form-control">
						<option selected>SC</option>
						<option>PR</option>
						<option>RS</option>
					</select>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
					<label for="inserirRua">Rua*</label> <input type="text" name="rua"
						required="required" class="form-control" maxlength="40">
				</div>
				<div class="form-group col-md-2">
					<label for="inputAddress2">Número*</label> <input type="text"
						name="numEnd" required="required" class="form-control"
						maxlength="5">
				</div>
				<div class="form-group col-md-3">
					<label for="inserirComplemento">Complemento</label> <input
						type="text" name="complemento" class="form-control" maxlength="20">
				</div>
				<div class="form-group col-md-2">
					<label for="inserirBairro">Bairro*</label> <input type="text"
						name="bairro" required="required" class="form-control"
						maxlength="20">
				</div>
			</div>
				<b>(*) Itens Obrigatórios</b><br>
			<button name="cadastrarCliente" type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
	</div>
</div>

</body>
</html>

