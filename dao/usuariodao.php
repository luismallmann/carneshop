<?php
require 'db/conexao.php';

// função pra validar o login
function validaLogin($login, $senha)
{
    global $conexao; // acessa a variável conexão
                     // consulta - select
    $comando = $conexao->prepare('select count(*) as conta
        from funcionario where logfun = ? and senfun = md5(?)');
    // executa a consulta
    $comando->execute([
        $login,
        $senha
    ]);
    // descarregar o resultado
    $retorno = $comando->fetch(PDO::FETCH_ASSOC);
    // retorno é um array associativo
    return $retorno["conta"] > 0;
}

function cadastraUsuario($usuario)
{
    
    $usuario['cpf'] = str_replace("-", "", $usuario['cpf']);
    $usuario['cpf'] = str_replace(".", "", $usuario['cpf']);
    $usuario['telefone'] = str_replace("-", "", $usuario['telefone']);
    $usuario['CEP'] = str_replace("-", "", $usuario['CEP']);
    
    global $conexao; // acessa a variável conexão
    try {
        //insere os dados na tabela cliente
       $comando = $conexao->prepare('INSERT INTO CLIENTE(CPFCLNT, NOMCLNT, NASCLNT,
         EMLCLNT, SENCLNT) VALUES(?,?,?,?,md5(?))');
               
        $comando->execute([
            $usuario['cpf'],
            $usuario['nome'],
            $usuario['datanas'],
            $usuario['email'],
            $usuario['senha']
        ]);
        
        //insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('INSERT INTO ENDERECO_CLIENTE(CLIENTECPFCLNT, CIDENDCLNT, ESTENDCLNT, CEPENDCLNT, RUAENDCLNT,
 NUMENDCLNT, BAIENDCLNT, CMPENDCLNT) VALUES(?,?,?,?,?,?,?,?)');
        
        $comando->execute([
            $usuario['cpf'],
            $usuario['cidade'],
            $usuario['estado'],
            $usuario['CEP'],
            $usuario['rua'],
            $usuario['numEnd'],
            $usuario['bairro'],
            $usuario['complemento']
        ]);
        
        
        //insere os dados na tabela telefone_cliente
        $comando = $conexao->prepare('INSERT INTO TELEFONE_CLIENTE(CLIENTECPFCLNT, DDDTELCLNT, NUMTELCLNT) VALUES(?,?,?)');
        
        $comando->execute([
            $usuario['cpf'],
            $usuario['ddd'],
            $usuario['telefone'],
        ]);
        return true;
    } catch (PDOException $e) {
        return $e;
        //echo $e->getMessage();
    }
}

function cadastraProduto($produto, $caminho_imagem)
/*
 * conexao tela de cadastro do produto com o bd
 */
{
    global $conexao; // acessa a variável conexão
    try {
        //insere os dados na tabela produto
        $comando = $conexao->prepare('INSERT INTO PRODUTO(DESPROD, NOMPROD, VALPROD,
         ESTPROD, IMGPROD) VALUES(?,?,?,?,?)');
              
        $comando->execute([
            $produto['descricao'],
            $produto['nome'],
            $produto['preco'],
            $produto['estoque'],
            $caminho_imagem
        ]);

        return true;
    } catch (PDOException $e) {
        return $e;
    }
}
?>