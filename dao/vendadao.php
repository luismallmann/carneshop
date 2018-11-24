<?php
require_once 'db/conexao.php';

function cadastraVenda($valorTotal, $codped)
{
    global $conexao; // acessa a variável conexão
    try {
       
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('INSERT INTO VENDA(VALVENDA, STSVENDA,DATVENDA, HORVENDA, PEDIDOCODPED) VALUES(?,?,CURRENT_DATE,CURRENT_TIME,?)');
        
        $comando->execute(array(
            $valorTotal,"PEDIDO RECEBIDO",
            $codped));
        return $conexao->lastInsertId();
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
function buscaVenda($codvenda)
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select V.*, P.* from VENDA V INNER JOIN PEDIDO P ON V.PEDIDOCODPED = P.CODPED WHERE V.CODVENDA = ?;"); // ordenação por padrão é ascendente
        $comando->execute([$codvenda]);
        
        return $comando->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
    
}
function alteraStatus($codvenda, $status)
{
    global $conexao; // acessa a variável conexão
    try {
        
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('UPDATE VENDA SET STSVENDA = ?, logfun =? WHERE CODVENDA = ?;');
        
        $comando->execute(array($status,$_SESSION['usuario'],$codvenda));
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}
function listaVendasCliente($cpf)
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select V.CODVENDA, V.VALVENDA, V.DATVENDA, V.HORVENDA
        from venda V
        inner join pedido P on P.codped = V.pedidocodped
        where P.clientecpfclnt = ?;"); // ordenação por padrão é ascendente
        $comando->execute(array($cpf));
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