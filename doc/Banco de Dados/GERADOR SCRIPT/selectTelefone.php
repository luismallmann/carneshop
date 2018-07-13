<?php
/*
 * INSERT INTO CLIENTE(CPFCLNT, NOMCLNT, SEXCLNT, NASCLNT,
 * EMLCLNT, SENCLNT) VALUES(?,?,?,?,?,md5(?))
 *
 * INSERT INTO ENDERECO_CLIENTE(CLIENTECPFCLNT, CIDENDCLNT, ESTENDCLNT, CEPENDCLNT, RUAENDCLNT,
 * NUMENDCLNT, BAIENDCLNT, CMPENDCLNT) VALUES(?,?,?,?,?,?,?,?)
 *
 * INSERT INTO TELEFONE_CLIENTE(CLIENTECPFCLNT, DDDTELCLNT, NUMTELCLNT) VALUES(?,?,?)
 */
// "Davi","Arthur","Pedro","Gabriel","Bernardo","Lucas","Matheus","Rafael","Heitor","Enzo","Guilherme","Nicolas","Lorenzo","Gustavo"
// "Alice","Julia","Isabella","Manuela","Laura","Luiza","Valentina","Giovanna","Maria Eduarda","Helena","Beatriz","Maria Luiza","Lara","Mariana"
for ($i = 00; $i < 100; $i ++) {
    $cpf = "130573680" . $i;
    $insert = "(" . $cpf . ", 49," . mt_rand(988000000, 999999999) . "),";
    echo $insert . "<br>";
    
    if ($i % 3 == 0) {
        $cpf = "130573680" . $i;
        $insert = "(" . $cpf . ", 49," . mt_rand(988000000, 999999999) . "),";
        echo $insert . "<br>";
    }
}

?>