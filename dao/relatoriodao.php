<?php
require_once 'db/conexao.php';

function relatorio1()
{
    global $conexao;
    
    try {
        $comando = $conexao->prepare("SELECT C.CPFCLNT, C.NOMCLNT FROM CLIENTE C INNER JOIN ENDERECO_CLIENTE T ON 
C.CPFCLNT = T.CLIENTECPFCLNT WHERE C.SEXCLNT = 'F' AND T.CIDENDCLNT ILIKE 'ITAPIRANGA' AND 
(CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS INTEGER) >= 20 and CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS 
INTEGER) <= 30) ORDER BY C.NOMCLNT;"); 
        
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $registro[$i++] = $reg;
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
T.CLIENTECPFCLNT GROUP BY C.CPFCLNT HAVING COUNT(T.CODTELCLNT) >= 2;");
        
        $comando->execute();
        // verificamos se foram retornados registros
        if ($comando->rowCount() > 0) {
            $i = 0;
            // descarrega um registro por vez
            while ($reg = $comando->fetch(PDO::FETCH_ASSOC)) {
                // registro é armazenado no vetor categoria
                $registro[$i++] = $reg;
            }
        }
        return $registro;
    } catch (PDOException $e) {
        return null;
    }
}
?>