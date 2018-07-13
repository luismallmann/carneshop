<?php
/*
 * INSERT INTO VENDA(VALVENDA, STSVENDA,DATVENDA, HORVENDA,
 * PEDIDOCODPED) VALUES(?,?,CURRENT_DATE,CURRENT_TIME,?)
 *
 * INSERT INTO PEDIDO(CLIENTECPFCLNT) VALUES(?)
 *
 * INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(?,?,?)');
 *
 */
$codprod = array(
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10
);
$pedidocodped = 0;
$qntproduto = 0;
$produtoXqnt = 0;
$valorVenda = 0;
$stsVenda = 0;

$horaVenda = 0;
$valorPedido = 0;

$valor = array(
    25.46,
    22.32,
    32.20,
    27.66,
    24.87,
    16.56,
    17.20,
    28.32,
    21.66,
    34.90
);
for ($j = 1; $j < 600; $j ++) {
    $valorPedido =0;
    $cpf = "130573680" . mt_rand(0,99);
    $dia=mt_rand(1, 28);
    $mes=mt_rand(1, 12);
    $ano=mt_rand(2015, 2018);
    if($ano == 2018){
        if($mes < 6){
            $dataVenda = $dia . "/" . $mes . "/" . $ano;
        }
    }
    else{
        $dataVenda = $dia . "/" . $mes . "/" . $ano;
    }
   
    $hora = mt_rand(10, 23) . ":" . mt_rand(00, 59) . ":" . mt_rand(00, 59);
    $codped=$j;
    $stringPedido = "INSERT INTO PEDIDO(CLIENTECPFCLNT) VALUES(". $cpf . ");";
    echo $stringPedido . "<br>";
    $k=mt_rand(1,5);
    $cod[0]=0;
    for ($i = 0; $i <= $k; $i ++) {
      
        do{
            $a=mt_rand(0, 9);
        }while(in_array($a, $cod));
        $cod[$i]=$a;
        $valorProduto = $valor[$cod[$i]];
        $qntproduto = mt_rand(1, 6);
        $valorTotalProduto = $valorProduto * $qntproduto;
        
        $stringPedido_Produto = "INSERT INTO PEDIDO_PRODUTO(PRODUTOCODPROD, PEDIDOCODPED, QNTPED) VALUES(" . $codprod[$cod[$i]] . "," . $codped . "," . $qntproduto . ");";
        echo $stringPedido_Produto . "<br>";
        $valorPedido += $valorTotalProduto;
    }
    $stringVenda = "(" . $valorPedido . ", 'PEDIDO RECEBIDO','
" . $dataVenda . "','" . $hora . "','" . $codped . "')";
    echo "INSERT INTO VENDA(VALVENDA, STSVENDA,DATVENDA, HORVENDA,
PEDIDOCODPED) VALUES " . $stringVenda . ";<br>";
}
?>