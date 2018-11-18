<?php
require_once 'db/conexao.php';

function relatorio1()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from relatorioUM_VW;");
        
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
function relatorio2()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from relatorioDOIS_VW;");
        
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
function relatorio3()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from relatorioTRES_VW;");
        
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
function relatorio4()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("select * from relatorioQUATRO_VW;");
        
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