<?php
require 'db/conexao.php';

function cadastraPedidoNovo($cpfclnt)
{
    global $conexao; // acessa a variável conexão
    try {
        
        // insere os dados na tabela pedido
        $comando = $conexao->prepare('INSERT INTO PEDIDO(CLIENTECPFCLNT) VALUES(?)');
        $codped = $comando->execute(array(
           $cpfclnt
        ));
        //retorno o ultimo cod inserido
        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}
function cadastraPedido($codprod, $codped, $qntdped)
{
    global $conexao; // acessa a variável conexão
    try {
       
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(?,?,?)');
        
        $comando->execute(array(
            $codprod,
            $codped,$qntdped));
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}
function atualizaPedido($codped, $codprod, $qntdped)
{
    global $conexao; // acessa a variável conexão
    try {      
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(?,?,?)');
        
        $comando->execute(array(
            $codprod,
            $codped,
            $qntdped
        ));
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}
function listaPedido_Produto($codped)
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from pedido_produto where pedidocodped = ? order by itempedidoprod"); // ordenação por padrão é ascendente
        $comando->execute([$codped]);
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $item[$i++] = $reg;
            }
        }
        return $item;
    } catch (PDOException $e) {
        return null;
    }
}

?>