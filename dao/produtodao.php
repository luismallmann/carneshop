<?php
require_once 'db/conexao.php';
require_once 'dao/vendadao.php';

function cadastraProduto($produto, $caminho_imagem)
/*
 * conexao tela de cadastro do produto com o bd
 */
{
    global $conexao; // acessa a variável conexão
    
    try {
        // insere os dados na tabela produto
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

function lista()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from produto
        order by codprod"); // ordenação por padrão é ascendente
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $produto[$i ++] = $reg;
            }
        }
        return $produto;
    } catch (PDOException $e) {
        return null;
    }
}

function atualiza($codigo, $produto)
{
    global $conexao;
    try {
        $comando = $conexao->prepare("update produto set nomprod = ?, desprod = ?, valprod = ?, estprod = ? where codprod = ?");
        $comando->execute([
            $produto['nome'],
            $produto['descricao'],
            $produto['preco'],
            $produto['estoque'],
            $codigo
        ]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function exclui(int $codigo)
{
    global $conexao;
    try {
        $comando = $conexao->prepare("delete from categoria where codcat = ?");
        $comando->execute([
            $codigo
        ]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function buscaProduto($codprod)
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from produto
         where codprod = ?"); // ordenação por padrão é ascendente
        $comando->execute([
            $codprod
        ]);
        
        return $comando->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

function buscaQuantidade($codprod)
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select estprod from produto
         where codprod = ?"); // ordenação por padrão é ascendente
        $comando->execute([
            $codprod
        ]);
        
        $retorno = $comando->fetch(PDO::FETCH_ASSOC);
        return $retorno['estprod'];
    } catch (PDOException $e) {
        return null;
    }
}

function atualizaQuantidadeFinal($codvenda)
{
    global $conexao;
    $venda = buscaVenda($codvenda);
    $codped = $venda['pedidocodped'];
    $reg = listaPedido_Produto($codped);
    try {
        foreach ($reg as $detalhaPedido) {
            
            $comando = $conexao->prepare("SELECT QNTPED FROM PEDIDO_PRODUTO WHERE PRODUTOCODPROD=? AND PEDIDOCODPED=?;"); // ordenação por padrão é ascendente
            $comando->execute(array(
                $detalhaPedido['produtocodprod'], $codped
            ));
            
            $produto = $comando->fetch(PDO::FETCH_ASSOC);
            
            $qntAtual = buscaQuantidade($detalhaPedido['produtocodprod']);
            $qntNova = $qntAtual - $produto['qntped'];
            
            $comando = $conexao->prepare("UPDATE PRODUTO SET ESTPROD = ? WHERE CODPROD = ?;"); // ordenação por padrão é ascendente
            $comando->execute(array(
                $qntNova,
                $detalhaPedido['produtocodprod']
            ));
            
            return true;
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>
