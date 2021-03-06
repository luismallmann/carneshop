<?php
    require 'db/conexao.php';
        
    // função pra validar o login
    function validaLogin($login, $senha) {
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select count(*) as conta
        from cliente where emlclnt = ? and senclnt = md5(?)');
        // executa a consulta
        $comando->execute([$login, $senha]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        return $retorno["conta"] > 0;
    }
    
    function cadastraUsuario($usuario)
    {
        
        $usuario['cpf'] = str_replace("-", "", $usuario['cpf']);
        $usuario['cpf'] = str_replace(".", "", $usuario['cpf']);
        $usuario['telefoneObg'] = str_replace("-", "", $usuario['telefoneObg']);
        $usuario['CEP'] = str_replace("-", "", $usuario['CEP']);
        
        global $conexao; // acessa a variável conexão
        try {
            //insere os dados na tabela cliente
            $comando = $conexao->prepare('INSERT INTO CLIENTE(CPFCLNT, NOMCLNT, SEXCLNT, NASCLNT,
         EMLCLNT, SENCLNT) VALUES(?,?,?,?,?,md5(?))');
            
            $comando->execute([
                $usuario['cpf'],
                $usuario['nome'],
                $usuario['sexo'],
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
                $usuario['dddObg'],
                $usuario['telefoneObg']
            ]);
            
            if(isset($usuario['dddOpc']) && isset($usuario['telefoneOpc'])){
                $usuario['telefoneOpc'] = str_replace("-", "", $usuario['telefoneOpc']);
                //insere os dados na tabela telefone_cliente
                $comando = $conexao->prepare('INSERT INTO TELEFONE_CLIENTE(CLIENTECPFCLNT, DDDTELCLNT, NUMTELCLNT) VALUES(?,?,?)');
                
                $comando->execute([
                    $usuario['cpf'],
                    $usuario['dddOpc'],
                    $usuario['telefoneOpc']
                ]);
            }
            return true;
        } catch (PDOException $e) {
            return $e;
            //echo $e->getMessage();
        }
    }
    
    function buscaCPF($login) {
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select cpfclnt from cliente where emlclnt = ?');
        // executa a consulta
        $comando->execute([$login]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        
        return $retorno['cpfclnt'];
    }
    function buscaDadosPessoais($cpf){
        /*
         * busca usuario pelo cpf
         */
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select * from cliente where cpfclnt = ?');
        // executa a consulta
        $comando->execute([$cpf]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        
        return $retorno;
    }
    function buscaDadosPessoaisLogin($login){
        /*
         * busca usario pelo login
         */
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select * from cliente where emlclnt = ?');
        // executa a consulta
        $comando->execute([$login]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        
        return $retorno;
    }
    function buscaEndereco($cpf){
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select * from endereco_cliente where clientecpfclnt = ?');
        // executa a consulta
        $comando->execute([$cpf]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        
        return $retorno;
    }
    function buscaTelefone($cpf){
        global $conexao; // acessa a variável conexão
        // consulta - select
        $comando = $conexao->prepare('select * from telefone_cliente where clientecpfclnt = ?');
        // executa a consulta
        $comando->execute([$cpf]);
        // descarregar o resultado
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        // retorno é um array associativo
        
        return $retorno;
    }
    function listaClientes()
    {
        global $conexao;
        
        try {
            $comando = $conexao->prepare("SELECT C.CPFCLNT, C.EMLCLNT, C.NOMCLNT, E.CIDENDCLNT, 
        E.ESTENDCLNT FROM CLIENTE C INNER JOIN  ENDERECO_CLIENTE E ON C.CPFCLNT = E.CLIENTECPFCLNT ORDER BY C.NOMCLNT;"); // ordenação por padrão é ascendente
            $comando->execute();
            // verificamos se foram retornados registros
            if ($comando->rowCount() > 0) {
                $i = 0;
                // descarrega um registro por vez
                while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                    // registro é armazenado no vetor categoria
                    $cliente[$i++] = $reg;
                }
            }
            return $cliente;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    ?>