<?php
require 'db/conexao.php';

/**
 * Insere um novo categoria
 */

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
                $produto[$i++] = $reg;
            }
        }
        return $produto;
    } catch (PDOException $e) {
        return null;
    }
}
function atualiza($produto)
{
    global $conexao;
    try{
        $comando = $conexao->prepare("update categoria set nomprod = ?, desprod = ?, valprod = ?, estprod = ?, imgprod = ? where codprod = ?");
        $comando->execute([$produto["nome"], $produto["descrição"],$categoria["preço"], $categoria["estoque"], $categoria["imagem"], $produto["codigo"]]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
function exclui(int $codigo)
{
    global $conexao;
    try{
        $comando = $conexao->prepare("delete from categoria where codcat = ?");
        $comando->execute([$codigo]);
        return true;
    } catch (PDOException $e) {
        return false;
    }

}