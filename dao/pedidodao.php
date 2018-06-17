<?php
require_once 'db/conexao.php';
require_once 'dao/produtodao.php';

function cadastraPedidoNovo($cpfclnt)
{
    global $conexao; // acessa a variável conexão
    try {
        
        // insere os dados na tabela pedido
        $comando = $conexao->prepare('INSERT INTO PEDIDO(CLIENTECPFCLNT) VALUES(?)');
        $codped = $comando->execute(array(
            $cpfclnt
        ));
        // retorno o ultimo cod inserido
        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
        // echo $e->getMessage();
    }
}

function cadastraPedido($codprod, $codped, $qntdped)
{
    global $conexao; // acessa a variável conexão
    
    if (buscaQuantidade($codprod) >= $qntdped) {
        try {
            $comando = $conexao->prepare('INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(?,?,?)');
            
            $comando->execute(array(
                $codprod,
                $codped,
                $qntdped
            ));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        return false;
    }
}

function atualizaPedido($codped, $codprod, $qntdped)
{
    global $conexao; // acessa a variável conexão
    try {
        $ped = buscaPedidoProduto($codped, $codprod);        
        if ($ped['qntped'] == NULL) {
            if (buscaQuantidade($codprod) >= $qntdped) {
                $comando = $conexao->prepare('INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(?,?,?)');
                
                $comando->execute(array(
                    $codprod,
                    $codped,
                    $qntdped
                ));
                return true;
            } else {
                false;
            }
        } else {
            $qntAtual= $ped['qntped'];
            $qntDesejada = $qntAtual + $qntdped;
            if(buscaQuantidade($codprod) > $qntDesejada){
                $comando = $conexao->prepare('UPDATE PEDIDO_PRODUTO SET QNTPED = ? WHERE PEDIDOCODPED=? AND PRODUTOCODPROD=?; ');
                
                $comando->execute(array(
                    $qntDesejada,
                    $codped,
                    $codprod
                ));
                return true;
            }else{
                false;
            }
            
        }
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
        $comando->execute([
            $codped
        ]);
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $item[$i ++] = $reg;
            }
        }
        return $item;
    } catch (PDOException $e) {
        return null;
    }
}

function buscaPedidoProduto($codped, $codprod)
{
    global $conexao; // acessa a variável conexão
    try {
        // insere os dados na tabela endereco_cliente
        $comando = $conexao->prepare('SELECT * FROM PEDIDO_PRODUTO WHERE PEDIDOCODPED = ?  AND PRODUTOCODPROD = ?;');
        
        $comando->execute(array(
            $codped,
            $codprod
        ));
        
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        return $retorno;
    } catch (PDOException $e) {
        return false;
        // echo $e->getMessage();
    }
}
?>