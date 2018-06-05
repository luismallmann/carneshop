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
