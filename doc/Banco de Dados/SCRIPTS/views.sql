create view relatorioUM_VW AS
SELECT C.CPFCLNT, C.NOMCLNT 
FROM CLIENTE C 
INNER JOIN ENDERECO_CLIENTE T 
ON C.CPFCLNT = T.CLIENTECPFCLNT WHERE C.SEXCLNT = 'F' AND T.CIDENDCLNT ILIKE 'ITAPIRANGA' AND 
(CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS INTEGER) >= 20 and CAST(TO_CHAR(AGE(current_date, c.nasclnt),'YY') AS 
INTEGER) <= 30) 
group by c.nomclnt,c.cpfclnt 
ORDER BY C.NOMCLNT;

create view relatorioDOIS_VW AS
SELECT C.CPFCLNT, C.NOMCLNT 
FROM CLIENTE C INNER JOIN TELEFONE_CLIENTE T 
ON C.CPFCLNT = T.CLIENTECPFCLNT 
GROUP BY C.CPFCLNT 
HAVING COUNT(T.CODTELCLNT) >= 2 
ORDER BY C.NOMCLNT;

create view relatorioTRES_VW AS
SELECT DATE_PART('MONTH' , DATVENDA),V.CODVENDA, COUNT(E.PRODUTOCODPROD), V.VALVENDA 
FROM VENDA V 
INNER JOIN PEDIDO D ON V.PEDIDOCODPED = D.CODPED  
INNER JOIN PEDIDO_PRODUTO E ON D.CODPED = E.PEDIDOCODPED 
where (CAST(DATE_PART('MONTH' , DATVENDA) AS INTEGER)%2 = 0)   AND (DATE_PART('YEAR' , DATVENDA) = '2017')
group by V.CODVENDA 
ORDER BY DATE_PART('MONTH' , DATVENDA), VALVENDA DESC;

create view relatorioQUATRO_VW AS
SELECT  p.codprod, p.nomprod, v.datvenda, v.valvenda
FROM pedido_produto pp
INNER JOIN pedido pe ON pe.codped = pp.pedidocodped
INNER JOIN venda v on v.pedidocodped = pe.codped
INNER JOIN produto p on p.codprod = pp.produtocodprod
WHERE v.datvenda = (select max(datvenda) from venda)
and v.horvenda =  (select max(horvenda) from venda where datvenda = v.datvenda)
order by p.nomprod;