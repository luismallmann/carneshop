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
