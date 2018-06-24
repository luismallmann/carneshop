<?php
require_once 'db/conexao.php';

function relatorio1()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("SELECT C.CPFCLNT, C.NOMCLNT FROM CLIENTE C INNER JOIN ENDERECO_CLIENTE T ON 
C.CPFCLNT = T.CLIENTECPFCLNT WHERE C.SEXCLNT = 'F' AND T.CIDENDCLNT ILIKE 'ITAPIRANGA' AND 
(CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS INTEGER) >= 20 and CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS 
INTEGER) <= 30) group by c.nomclnt,c.cpfclnt ORDER BY C.NOMCLNT;");
        
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
        $comando = $conexao->prepare("SELECT C.CPFCLNT, C.NOMCLNT FROM CLIENTE C INNER JOIN TELEFONE_CLIENTE T ON C.CPFCLNT = 
T.CLIENTECPFCLNT GROUP BY C.CPFCLNT HAVING COUNT(T.CODTELCLNT) >= 2 ORDER BY C.NOMCLNT;");
        
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
        $comando = $conexao->prepare("SELECT DATE_PART('MONTH' , DATVENDA),V.CODVENDA, COUNT(E.PRODUTOCODPROD), V.VALVENDA FROM VENDA V 
INNER JOIN PEDIDO D ON V.PEDIDOCODPED = D.CODPED  INNER JOIN PEDIDO_PRODUTO E ON D.CODPED = E.PEDIDOCODPED WHERE
(CAST(DATE_PART('MONTH' , DATVENDA) AS INTEGER)%2 = 0)   AND (DATE_PART('YEAR' , DATVENDA) = '2017')group by
V.CODVENDA ORDER BY DATE_PART('MONTH' , DATVENDA), VALVENDA DESC;");
        
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