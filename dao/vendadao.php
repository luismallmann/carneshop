<?php
require 'db/conexao.php';

function cadastraVenda($valorTotal, $codped)
{
    global $conexao; // acessa a variável conexão
    try {
       
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('INSERT INTO VENDA(VALVENDA, STSVENDA,DATVENDA, HORVENDA, PEDIDOCODPED) VALUES(?,?,CURRENT_DATE,CURRENT_TIME,?)');
        
        $comando->execute(array(
            $valorTotal,"PENDENTE DE ENTREGA",
            $codped));
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}
?>