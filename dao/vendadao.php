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
function listaVendas()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from venda
        order by codvenda"); // ordenação por padrão é ascendente
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $venda[$i++] = $reg;
            }
        }
        return $venda;
    } catch (PDOException $e) {
        return null;
    }
}

?>