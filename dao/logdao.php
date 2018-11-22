<?php
require_once 'db/conexao.php';

function produto_log()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from produto_log;");
        
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $registro[$i ++] = $reg;
            }
        }
        return $registro;
    } catch (PDOException $e) {
        return null;
    }
}
function venda_log()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from venda_log;");
        
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $registro[$i ++] = $reg;
            }
        }
        return $registro;
    } catch (PDOException $e) {
        return null;
    }
}
?>